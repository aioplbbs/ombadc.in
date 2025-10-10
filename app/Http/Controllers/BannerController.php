<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Str;

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
        $data = Setting::where('name', 'banner')->first();
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
            'banner' => 'image|max:2048', // 5MB max
        ]);
        $setting = Setting::where('name', 'banner')->first();
        if ($request->hasFile('banner') && !empty($setting)) {
            $file = $request->file('banner');
            $setting->addMedia($file)
                ->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())
                ->withCustomProperties([
                    'name' => $request->name??"Banner",
                    'status' => $request->status??"Show"
                ])
                ->toMediaCollection('banner');
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
        $setting = Setting::where('name', 'banner')->first();
        $media = $setting->media()->where('id', $id)->first();
        return view('banner.update', compact('media', 'breadcrumb'));
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
        $setting = Setting::where('name', 'banner')->first();
        $media = $setting->media()->where('id', $id)->first();

        if ($request->hasFile('banner') && !empty($setting)) {
            $media->delete();
            $file = $request->file('banner');
            $setting->addMedia($file)
                ->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())
                ->withCustomProperties([
                    'name' => $request->name??"Banner",
                    'status' => $request->status
                ])
                ->toMediaCollection('banner');
            return redirect()->route('banner.index')->with('success', 'Banner Uploaded Successfully.');
        }else{
            $media->setCustomProperty('name', $request->name);
            $media->setCustomProperty('status', $request->status);
            $media->save();
        }
        return redirect()->route('banner.index')->with('error', 'There is some error. Please try after sometime.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $setting = Setting::where('name', 'banner')->first();
        $media = $setting->media()->where('id', $id)->first();
        $media->delete();
        return redirect()->back()->with('success', 'Banner Deleted Successfully');
    }
}
