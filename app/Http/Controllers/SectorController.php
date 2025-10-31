<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Http\Requests\PageRequest;
use App\Models\Gallery;
use Mews\Purifier\Facades\Purifier;
use Str;

class SectorController extends Controller
{
    public function __construct()
    {
        // Protect entire controller
        $this->middleware('permission:view sector')->only(['index']);
        $this->middleware('permission:create sector')->only(['create', 'store']);
        $this->middleware('permission:update sector')->only(['edit', 'update']);
        $this->middleware('permission:delete sector')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = [
            'title' => "Sector List",
            'items' => ["Home"],
            'last_item' => "Sector"
        ];
        $pages = Page::where('page_type', 'Sector')->orderBy('id', 'desc')->paginate(20);
        return view('sector.index', compact('pages', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = [
            'title' => "Add Sector",
            'items' => ["Home", "Sector"],
            'last_item' => "Add Sector"
        ];

        $galleries = Gallery::where('status', 'Show')->get();

        return view('sector.create', compact('breadcrumb', 'galleries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
    {
        $data = $request->all();
        $data['page_type'] = 'Sector';
        $data['page_content'] = Purifier::clean($data['page_content'], 'relaxed');
        $page = New Page($data);
        $page->save();
        $page->customData()->updateOrCreate(
            ['name' => 'sector_data'],
            ['data' => $request->input('custom', [])]
        );
        $page->customData()->updateOrCreate(
            ['name' => 'gallery_data'],
            ['data' => $request->input('gallery', [])]
        );
        if($request->hasFile('banner')){
            $file = $request->file('banner');
            $page->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('page_banner');
        }
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $page->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('page_photo');
        }
    
        return redirect()->route('sector.index')->with('success', "Page Added Successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $sector)
    {
        $breadcrumb = [
            'title' => "Update Sector",
            'items' => ["Home", "Sector"],
            'last_item' => "Update Sector"
        ];

        $galleries = Gallery::where('status', 'Show')->get();

        return view('sector.update', compact('sector', 'breadcrumb', 'galleries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, Page $sector)
    {
        $data = $request->all();
        if($request->hasFile('banner')){
            $sector->clearMediaCollection('page_banner');
            $file = $request->file('banner');
            $sector->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('page_banner');
        }
        if($request->hasFile('photo')){
            $sector->clearMediaCollection('page_photo');
            $file = $request->file('photo');
            $sector->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('page_photo');
        }
        $data['page_content'] = Purifier::clean($data['page_content'], 'relaxed');
        $sector->update($data);
        $sector->customData()->updateOrCreate(
            ['name' => 'sector_data'],
            ['data' => $request->input('custom', [])]
        );
        $sector->customData()->updateOrCreate(
            ['name' => 'gallery_data'],
            ['data' => $request->input('gallery', [])]
        );

        return redirect()->route('sector.index')->with('success', "Page Updated Successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->back()->with('success', 'Notice Deleted Successfully');
    }

    public function imageDestroy(Page $page, $gid)
    {
        $media = $page->media()->where('id', $gid)->first();
        if($media){
            $media->delete();
            return redirect()->back()->with('success', 'Image Deleted Successfully');
        }
        return redirect()->back()->with('error', 'Image not found');
    }
}
