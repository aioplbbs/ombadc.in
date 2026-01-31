<?php

namespace App\Http\Controllers\MIS;

use App\Http\Controllers\Controller;
use App\Http\Requests\MIS\SectorRequest;
use App\Models\MIS\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = [
            'title' => "Sectors",
            'items' => ["Home"],
            'last_item' => "Sectors"
        ];
        $sectors = Sector::get();

        return view('mis.sectors.index', compact('sectors', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = [
            'title' => "Add Sector",
            'items' => ["Home", "Sectors"],
            'last_item' => "Add Sector"
        ];

        return view('mis.sectors.create', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectorRequest $request)
    {
        $sector = Sector::create([
            "name" => $request->name
        ]);

        return redirect()->back()->with('success', 'Sector created successfully.');
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
    public function edit(Sector $sector)
    {
        $breadcrumb = [
            'title' => "Edit Sector",
            'items' => ["Home", "Sectors"],
            'last_item' => "Edit Sector"
        ];

        return view('mis.sectors.edit', compact('breadcrumb', 'sector'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SectorRequest $request, Sector $sector)
    {
        $sector->update([
            "name" => $request->name
        ]);

        return redirect()->back()->with('success', 'Sector updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sector $sector)
    {
        $sector->delete();
        return redirect()->back()->with('success', 'Sector deleted successfully.');
    }

    public function activate(Sector $sector){
        $sector->update(['status'=>1]);
        return redirect()->back()->with('success', 'Sector activated successfully');
    }

    public function deactivate(Sector $sector){
        $sector->update(['status'=>0]);
        return redirect()->back()->with('success', 'Sector deactivated successfully');
    }
}
