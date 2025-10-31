<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\District;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Menu;
use App\Models\Notice;
use App\Models\Faculty;
use App\Models\Setting;
use App\Models\Gallery;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $menus = $notices = [];
        $setting = Setting::where('name', 'menu')
            ->with(['menus' => function($q){
                $q->whereNull('parent_id')->orderBy('position', 'asc')->with('children');
            }])->get();
        
        $area_overview = Setting::where('name', 'area_overview')->first();


        if(!empty($setting)){
            foreach ($setting as $value) {
                $menus[$value->data['name']] = $this->buildMenuTree($value->menus);
            }
        }

        $setting = Setting::where('name', 'banner')->first();
        $banners = $setting->getMedia('banner')->filter(fn($media) => $media->getCustomProperty('status') === 'Show')->toArray();
        $notice = Notice::where('status', 'Show')->orderBy('notice_publish', 'desc')->get();
        $galleries = Media::where('collection_name', 'gallery')
            ->orderBy('created_at', 'desc')  // optional: latest first
            ->take(9)
            ->get();
        foreach ($notice as $value) {
            $not = $value->notice_category ?? [];

            foreach ($not as $category) {
                $notices[$category][] = $value->toArray();
            }
        }

        $sectors=Page::with('departments.projects', 'customData')->where('page_type', 'Sector')->get();
        $districts = District::all();
        $departments = Department::all();
        // dd($sectors);

        return view('front_end.index', compact('menus', 'notices', 'banners', 'galleries', 'area_overview', 'sectors', 'districts', 'departments'));
    }

    public function page($slug = '')
    {
        if($page = Page::with('customData')->where('slug', $slug)->first()){
            $menus = [];
            $setting = Setting::where('name', 'menu')
            ->with(['menus' => function($q){
                $q->whereNull('parent_id')->orderBy('position', 'asc')->with('children');
            }])->get();

            if(!empty($setting)){
                foreach ($setting as $value) {
                    $menus[$value->data['name']] = $this->buildMenuTree($value->menus);
                }
            }

            return view('front_end.pages', compact('menus', 'page'));
        }
        return redirect(url('/'));
    }

    public function faculty(Request $request, $slug)
    {
        if($page = Page::where('slug', $slug)->first()){
            $setting = Setting::where('name', 'menu')
                ->with(['menus' => function($q){
                    $q->whereNull('parent_id')->orderBy('position', 'asc')->with('children');
                }])->get();

            if(!empty($setting)){
                foreach ($setting as $value) {
                    $menus[$value->data['name']] = $this->buildMenuTree($value->menus);
                }
            }

            $faculties = $page->faculties;

            return view('front_end.faculty', compact('menus', 'faculties'));
        }
        return redirect(url('/'));
    }

    public function profile(Request $request, $slug)
    {
        $setting = Setting::where('name', 'menu')
            ->with(['menus' => function($q){
                $q->whereNull('parent_id')->orderBy('position', 'asc')->with('children');
            }])->get();

        if(!empty($setting)){
            foreach ($setting as $value) {
                $menus[$value->data['name']] = $this->buildMenuTree($value->menus);
            }
        }

        $faculty = Faculty::where('slug', $slug)->first();

        return view('front_end.profile', compact('menus', 'faculty'));
    }

    public function gallery(Request $request, $slug = Null)
    {
        $setting = Setting::where('name', 'menu')
            ->with(['menus' => function($q){
                $q->whereNull('parent_id')->orderBy('position', 'asc')->with('children');
            }])->get();

        if(!empty($setting)){
            foreach ($setting as $value) {
                $menus[$value->data['name']] = $this->buildMenuTree($value->menus);
            }
        }

        if(!empty($slug) && $gallery = Gallery::where('slug', $slug)->first()){
            return view('front_end.gallery', compact('menus', 'gallery'));
        }else{
            $galleries = Gallery::get();
            return view('front_end.gallery', compact('menus', 'galleries'));
        }
    }

    public function all(Request $request, $slug)
    {
        $setting = Setting::where('name', 'menu')
            ->with(['menus' => function($q){
                $q->whereNull('parent_id')->orderBy('position', 'asc')->with('children');
            }])->get();

        if(!empty($setting)){
            foreach ($setting as $value) {
                $menus[$value->data['name']] = $this->buildMenuTree($value->menus);
            }
        }

        if($slug == "notice"){
            $notices = Notice::whereJsonContains('notice_category', "Notices")->orderBy('notice_publish', 'desc')->paginate(1);
        }elseif($slug == "news"){
            $notices = Notice::whereJsonContains('notice_category', "News & Event")->orderBy('notice_publish', 'desc')->paginate(20);
        }else{
            return redirect(url('/'));
        }

        return view('front_end.all', compact('menus', 'notices'));
    }

    private function buildMenuTree($menus) {
        $result = [];
        
        foreach ($menus as $menu) {
            if (!empty($menu->url_external)) {
                $url = $menu->url;
            } elseif ($menu->is_faculty) {
                $url = url('faculties/' . $menu->url);
            } elseif (!empty($menu->url_internal)) {
                $url = url('pages/' . $menu->url);
            } else {
                $url = "#";
            }

            $item = [
                'title' => $menu->title,
                'url'   => $url,
            ];

            // if children exist → recurse
            if ($menu->children->isNotEmpty()) {
                $item['children'] = $this->buildMenuTree($menu->children);
            }

            $result[] = $item;
        }

        return $result;
    }

    public function history(){
        $menus = $notices = [];
        $setting = Setting::where('name', 'menu')
            ->with(['menus' => function($q){
                $q->whereNull('parent_id')->orderBy('position', 'asc')->with('children');
            }])->get();
        
        $area_overview = Setting::where('name', 'area_overview')->first();


        if(!empty($setting)){
            foreach ($setting as $value) {
                $menus[$value->data['name']] = $this->buildMenuTree($value->menus);
            }
        }

        $departments = Department::all();

        return view('front_end.history', compact('menus', 'departments'));
    }

    public function purpose(){
        $menus = $notices = [];
        $setting = Setting::where('name', 'menu')
            ->with(['menus' => function($q){
                $q->whereNull('parent_id')->orderBy('position', 'asc')->with('children');
            }])->get();
        
        $area_overview = Setting::where('name', 'area_overview')->first();


        if(!empty($setting)){
            foreach ($setting as $value) {
                $menus[$value->data['name']] = $this->buildMenuTree($value->menus);
            }
        }

        $departments = Department::all();

        return view('front_end.purpose-of-spv', compact('menus', 'departments'));
    }

    public function organogram(){
        $menus = $notices = [];
        $setting = Setting::where('name', 'menu')
            ->with(['menus' => function($q){
                $q->whereNull('parent_id')->orderBy('position', 'asc')->with('children');
            }])->get();
        
        $area_overview = Setting::where('name', 'area_overview')->first();


        if(!empty($setting)){
            foreach ($setting as $value) {
                $menus[$value->data['name']] = $this->buildMenuTree($value->menus);
            }
        }

        $departments = Department::all();

        return view('front_end.organogram', compact('menus', 'departments'));
    }
}
