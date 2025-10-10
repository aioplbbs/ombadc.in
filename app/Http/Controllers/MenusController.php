<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Page;
use App\Models\Menu;
use App\Http\Requests\MenuRequest;
use Str;

class MenusController extends Controller
{
    public function __construct()
    {
        // Protect entire controller
        $this->middleware('permission:view menu')->only(['index']);
        $this->middleware('permission:create menu')->only(['create', 'store']);
        $this->middleware('permission:update menu')->only(['edit', 'update']);
        $this->middleware('permission:delete menu')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Setting::where('name', 'menu')->get();
        return view('menu.menus', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $setting = Setting::whereJsonContains('data->name', $request->name)
        ->firstOrCreate(
            ['name' => 'menu'],
            ['data' => ['name' => $request->name]]
        );

        return redirect()->back()->with('success', "Menu Container Added Successfully.");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        $setting->data = [
            'name' => $request->name
        ];
        $setting->save();

        return redirect()->back()->with('success', "Menus Container Updated Successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        Menu::where('setting_id', $setting->id)->delete();
        $setting->delete();
        return redirect()->back()->with('success', 'Menu Container Deleted Successfully');
    }
}
