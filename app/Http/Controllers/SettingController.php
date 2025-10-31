<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Str;

class SettingController extends Controller
{
    public function __construct()
    {
        // Protect entire controller
        $this->middleware('permission:view settings')->only(['index']);
        $this->middleware('permission:update settings')->only(['store']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = [
            'title' => "Settings",
            'items' => ["Home"],
            'last_item' => "Settings"
        ];
        $setting = Setting::whereIn('name', ['site_title', 'site_logo', 'site_favicon', 'social', 'mobile', 'email', 'address', 'map', 'area_overview'])->pluck('data', 'name');
        return view('setting.index', compact('setting', 'breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SettingRequest $request)
    {
        Setting::updateOrCreate(
            ['name' => 'site_title'],
            ['data' => ['title' => $request->site_title]]
        );
        Setting::updateOrCreate(
            ['name' => 'social'],
            ['data' => $request->social]
        );
        Setting::updateOrCreate(
            ['name' => 'area_overview'],
            ['data' => $request->area_overview]
        );
        Setting::updateOrCreate(
            ['name' => 'mobile'],
            ['data' => ["value"=>$request->mobile]]
        );
        Setting::updateOrCreate(
            ['name' => 'email'],
            ['data' => ["value"=>$request->email]]
        );
        Setting::updateOrCreate(
            ['name' => 'address'],
            ['data' => ["value"=>$request->address]]
        );
        Setting::updateOrCreate(
            ['name' => 'map'],
            ['data' => ["value"=>$request->map]]
        );
        if($request->hasFile('site_favicon')){
            $favicon = Setting::updateOrCreate(
                ['name' => 'site_favicon'],
                ['data' => []]
            );
            $favicon->clearMediaCollection('site_favicon');
            $file = $request->file('site_favicon');
            $favicon->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('site_favicon');
        }
        if($request->hasFile('site_logo')){
            $logo = Setting::updateOrCreate(
                ['name' => 'site_logo'],
                ['data' => []]
            );
            $logo->clearMediaCollection('site_logo');
            $file = $request->file('site_logo');
            $logo->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('site_logo');
        }

        session()->forget('site_settings');
    
        return redirect()->route('settings.index')->with('success', "Setting Added Successfully.");
    }
}
