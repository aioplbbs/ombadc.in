<?php

namespace App\Http\Controllers\MIS;

use App\Http\Controllers\Controller;
use App\Http\Requests\MIS\PiaRequest;
use App\Models\MIS\Pia;
use App\Models\MIS\Sector;
use Illuminate\Http\Request;

class PiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = [
            'title' => "PIA",
            'items' => ["Home"],
            'last_item' => "PIA"
        ];
        $pias = Pia::with('sector')->get();

        return view('mis.pia.index', compact('pias', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = [
            'title' => "Add PIA",
            'items' => ["Home", "PIA"],
            'last_item' => "Add PIA"
        ];
        $sectors = Sector::where('status', "1")->get();

        return view('mis.pia.create', compact('breadcrumb', 'sectors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PiaRequest $request)
    {
        $pia = Pia::create([
            "sector_id" => $request->sector_id,
            "name" => $request->name, 
            "effective_date" => $request->effective_date
        ]);

        return redirect()->back()->with('success', 'PIA created successfully.');
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
    public function edit(Pia $pia)
    {
        $breadcrumb = [
            'title' => "Edit PIA",
            'items' => ["Home", "PIA"],
            'last_item' => "Edit PIA"
        ];
        $sectors = Sector::where('status', "1")->get();

        return view('mis.pia.edit', compact('breadcrumb', 'sectors', 'pia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PiaRequest $request, Pia $pia)
    {
        $pia->update([
            "sector_id" => $request->sector_id,
            "name" => $request->name, 
            "effective_date" => $request->effective_date
        ]);

        return redirect()->back()->with('success', 'PIA updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pia $pia)
    {
        $pia->delete();
        return redirect()->back()->with('success', 'PIA deleted successfully.');
    }

    public function activate(Pia $pia){
        $pia->update(['status'=>1]);
        return redirect()->back()->with('success', 'Pia activated successfully');
    }

    public function deactivate(Pia $pia){
        $pia->update(['status'=>0]);
        return redirect()->back()->with('success', 'Pia deactivated successfully');
    }
}
