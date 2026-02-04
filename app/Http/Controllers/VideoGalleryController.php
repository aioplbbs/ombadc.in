<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoGalleryRequest;
use App\Models\VideoGallery;
use Illuminate\Http\Request;

class VideoGalleryController extends Controller
{
    public function __construct()
    {
        // Protect entire controller
        $this->middleware('permission:view video-gallery')->only(['index']);
        $this->middleware('permission:create video-gallery')->only(['create', 'store']);
        $this->middleware('permission:update video-gallery')->only(['edit', 'update']);
        $this->middleware('permission:delete video-gallery')->only(['destroy']);
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

        $videos = VideoGallery::orderBy('id', 'desc')->paginate(20);
        return view('video-gallery.index', compact('videos', 'breadcrumb'));
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
        return view('video-gallery.create', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideoGalleryRequest $request)
    {
        $data = $request->all();
        $order = VideoGallery::max('order');
        $data['order'] = $order+1;
        $gallery = New VideoGallery($data);
        $gallery->save();
        return redirect()->route('video-gallery.index')->with('success', "Gallery created Successfully.");
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
    public function edit(VideoGallery $videoGallery)
    {
        $breadcrumb = [
            'title' => "Update Gallery",
            'items' => ["Home"],
            'last_item' => "Gallery"
        ];
        return view('video-gallery.update', compact('videoGallery', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VideoGalleryRequest $request, VideoGallery $videoGallery)
    {
        $data = $request->all();
        $videoGallery->update($data);
        return redirect()->route('video-gallery.index')->with('success', "Gallery Updated Successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VideoGallery $videoGallery){
        $videoGallery->delete();
        return redirect()->route('video-gallery.index')->with('success', "Gallery deleted Successfully.");
    }
}
