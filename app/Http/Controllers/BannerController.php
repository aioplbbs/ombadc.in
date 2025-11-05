<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function __construct()
    {
        // Protect entire controller
        $this->middleware('permission:view banner')->only(['index', 'show']);
        $this->middleware('permission:create banner')->only(['create', 'store']);
        $this->middleware('permission:update banner')->only(['edit', 'update']);
        $this->middleware('permission:delete banner')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $breadcrumb = [
            'title' => "Update Banner",
            'items' => ["Home"],
            'last_item' => "Banner"
        ];
        $data = Banner::orderBy("id","desc")->paginate(10);
        return view('banner.index', compact('data', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $breadcrumb = [
            'title' => "Update Banner",
            'items' => ["Home"],
            'last_item' => "Banner"
        ];
        return view('banner.create', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'banner' => 'array',
            'banner.*' => 'image|max:2048'
        ]);
        // $setting = Setting::where('name', 'banner')->first();
        $banner = Banner::create([
            'caption'=>$request->name
        ]);
        if ($request->hasFile('banner')) {
            foreach ($request->file('banner') as $file) {
                $banner->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('banner');
            }
            return redirect()->route('banner.index')->with('success', 'Banner Uploaded Successfully.');
        }
        return redirect()->route('banner.index')->with('error', 'There is some error. Please try after sometime.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $breadcrumb = [
            'title' => "Update Banner",
            'items' => ["Home"],
            'last_item' => "Banner"
        ];
        $banner = Banner::findOrFail($id);
        // $setting = Setting::where('name', 'banner')->first();
        // $media = $setting->media()->where('id', $id)->first();
        $media = $banner->getFirstMedia('banner');
        return view('banner.update', compact('banner', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'banner' => 'image|max:2048', // 5MB max
            'status' => 'in:Show,Hide'
        ]);
        // $setting = Setting::where('name', 'banner')->first();
        $banner = Banner::findOrFail($id);
        $media = $banner->getFirstMedia('banner');

        if ($request->hasFile('banner') && !empty($banner)) {
            $media->delete();
            $file = $request->file('banner');
            $banner->addMedia($file)
                ->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())
                ->withCustomProperties([
                    'status' => $request->status
                ])
                ->toMediaCollection('banner');
                $banner->update([
                    'caption'=>$request->name
                ]);
            return redirect()->route('banner.index')->with('success', 'Banner Uploaded Successfully.');
        }else{
            $media->setCustomProperty('status', $request->status);
            $media->save();
            $banner->update([
                'caption'=>$request->name
            ]);
        }
        return redirect()->route('banner.index')->with('error', 'There is some error. Please try after sometime.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->clearMediaCollection('banner');
        $banner->delete();
        return redirect()->back()->with('success', 'Banner Deleted Successfully');
    }

    public function imageDestroy(Banner $banner, $gid)
    {
        $media = $banner->getMedia('banner')->where('id', $gid)->first();
        if($media){
            $media->delete();
            return redirect()->back()->with('success', 'Image Deleted Successfully');
        }
        return redirect()->back()->with('error', 'Image not found');
    }
}
