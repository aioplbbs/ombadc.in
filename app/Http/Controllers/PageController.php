<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Http\Requests\PageRequest;
use Mews\Purifier\Facades\Purifier;
use Str;

class PageController extends Controller
{
    public function __construct()
    {
        // Protect entire controller
        $this->middleware('permission:view page')->only(['index']);
        $this->middleware('permission:create page')->only(['create', 'store']);
        $this->middleware('permission:update page')->only(['edit', 'update']);
        $this->middleware('permission:delete page')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = [
            'title' => "Page List",
            'items' => ["Home"],
            'last_item' => "Pages"
        ];
        $pages = Page::whereIn('page_type', ['Left', 'Right', 'None'])->orderBy('id', 'desc')->paginate(20);
        return view('page.index', compact('pages', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            $breadcrumb = [
                'title' => "Add New Page",
                'items' => ["Home", "Pages"],
                'last_item' => "Add Page"
            ];
        return view('page.create', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
    {
        $data = $request->all();
        $data['page_content'] = Purifier::clean($data['page_content']);
        $page = New Page($data);
        $page->save();
        if($request->hasFile('banner')){
            $file = $request->file('banner');
            $page->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('page_banner');
        }
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $page->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('page_photo');
        }
    
        return redirect()->route('page.index')->with('success', "Page Added Successfully.");
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
    public function edit(Page $page)
    {
        $breadcrumb = [
            'title' => "Update Page",
            'items' => ["Home", "Pages"],
            'last_item' => "Update Page"
        ];

        return view('page.update', compact('page', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, Page $page)
    {
        $data = $request->all();
        if($request->hasFile('banner')){
            $page->clearMediaCollection('page_banner');
            $file = $request->file('banner');
            $page->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('page_banner');
        }
        if($request->hasFile('photo')){
            $page->clearMediaCollection('page_photo');
            $file = $request->file('photo');
            $page->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('page_photo');
        }
        $data['page_content'] = Purifier::clean($data['page_content']);
        $page->update($data);

        return redirect()->route('page.index')->with('success', "Page Updated Successfully.");
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
