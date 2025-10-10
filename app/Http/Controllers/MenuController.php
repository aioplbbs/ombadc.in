<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Setting;
use App\Http\Requests\MenuRequest;
use Str;
use DB;

class MenuController extends Controller
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
    public function index(Setting $setting)
    {
        $menus = Menu::where('setting_id', $setting->id)->whereNull('parent_id')->with('children')->orderBy('position', 'asc')->get();
        return view('menu.index', compact('setting', 'menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Setting $setting)
    {
        $menus = Menu::where('setting_id', $setting->id)->pluck('title', 'id');
        $pages = Page::pluck('name', 'id');
        return view('menu.create', compact('setting', 'pages', 'menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request, Setting $setting)
    {
        $data = $request->all();
        $data['setting_id'] = $setting->id;
        $menu = New Menu($data);
        $menu->save();
        if($request->hasFile('menu_file')){
            $file = $request->file('menu_file');
            $menu->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('menu_file');
        }
    
        return redirect()->route('menu.index', [$setting->id])->with('success', "Menu Added Successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting, Menu $menu)
    {
        $menus = Menu::where('setting_id', $setting->id)->pluck('title', 'id');
        $pages = Page::pluck('name', 'id');
        return view('menu.update', compact('setting', 'menu', 'menus', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, Setting $setting, Menu $menu)
    {
        $data = $request->all();
        if($request->hasFile('menu_file')){
            $menu->clearMediaCollection('menu_file');
            $file = $request->file('menu_file');
            $menu->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('menu_file');
        }
        $menu->update($data);

        return redirect()->route('menu.index', [$setting->id])->with('success', "Menu Updated Successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting, Menu $menu)
    {
        $menu->delete();
        return redirect()->back()->with('success', 'Menu Deleted Successfully');
    }

    public function updatePosition(Request $request)
    {
        $data = json_decode($request->menu_data??[]);
        DB::transaction(function () use ($data) {
            $this->updateMenuHierarchy($data, null);
        });
        return $data;
    }

    private function updateMenuHierarchy(array $items, $parentId = null)
    {
        foreach ($items as $index => $item) {
            Menu::where('id', $item->id)->update([
                'parent_id' => $parentId,
                'position' => $index + 1 // position starts from 1
            ]);

            if (isset($item->children) && is_array($item->children)) {
                $this->updateMenuHierarchy($item->children, $item->id);
            }
        }
    }
}
