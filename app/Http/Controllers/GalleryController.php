<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Http\Requests\GalleryRequest;
use Str;

class GalleryController extends Controller
{
    public function __construct()
    {
        // Protect entire controller
        $this->middleware('permission:view gallery')->only(['index']);
        $this->middleware('permission:create gallery')->only(['create', 'store']);
        $this->middleware('permission:update gallery')->only(['edit', 'update']);
        $this->middleware('permission:delete gallery')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $breadcrumb = [
            'title' => "Update Gallery",
            'items' => ["Home"],
            'last_item' => "Gallery"
        ];

        $gallery = Gallery::orderBy('id', 'desc')->paginate(20);
        return view('gallery.index', compact('gallery', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          $breadcrumb = [
            'title' => "Update Gallery",
            'items' => ["Home"],
            'last_item' => "Gallery"
        ];
        return view('gallery.create', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryRequest $request)
    {
        $data = $request->all();
        $gallery = New Gallery($data);
        $gallery->save();
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $gallery->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('gallery');
            }
        }
    
        return redirect()->route('gallery.index')->with('success', "Gallery Added Successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
          $breadcrumb = [
            'title' => "Update Gallery",
            'items' => ["Home"],
            'last_item' => "Gallery"
        ];
        return view('gallery.update', compact('gallery', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalleryRequest $request, Gallery $gallery)
    {
        $data = $request->all();
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $gallery->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('gallery');
            }
        }
        $gallery->update($data);

        return redirect()->route('gallery.index')->with('success', "Gallery Updated Successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->clearMediaCollection('gallery');
        $gallery->delete();
        return redirect()->back()->with('success', 'Gallery Deleted Successfully');
    }

    public function imageDestroy(Gallery $gallery, $gid)
    {
        $media = $gallery->getMedia('gallery')->where('id', $gid)->first();
        if($media){
            $media->delete();
            return redirect()->back()->with('success', 'Image Deleted Successfully');
        }
        return redirect()->back()->with('error', 'Image not found');
    }
}
