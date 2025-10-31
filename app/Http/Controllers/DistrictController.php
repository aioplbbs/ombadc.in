<?php

namespace App\Http\Controllers;

use App\Http\Requests\DistrictRequest;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function __construct()
    {
        // Protect entire controller
        $this->middleware('permission:view district')->only(['index']);
        $this->middleware('permission:create district')->only(['create', 'store']);
        $this->middleware('permission:update district')->only(['edit', 'update']);
        $this->middleware('permission:delete district')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = [
            'title' => "District List",
            'items' => ["Home"],
            'last_item' => "Districts"
        ];
        $districts = District::orderBy('id', 'desc')->paginate(20);
        return view('district.index', compact('districts', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = [
            'title' => "Add District",
            'items' => ["Home", "District"],
            'last_item' => "Add District"
        ];
        return view('district.create', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DistrictRequest $request)
    {
        $data = $request->all();
        $district = new District($data);
        $district->save();
        return redirect()->route('district.index')->with('success', 'District created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(District $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(District $district)
    {
        $breadcrumb = [
            'title' => "Edit District",
            'items' => ["Home", "District"],
            'last_item' => "Edit District"
        ];
        return view('district.update', compact('district', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DistrictRequest $request, District $district)
    {
        $data = $request->all();
        $district->update($data);
        return redirect()->route('district.index')->with('success', 'District updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(District $district)
    {
        $district->delete();
        return redirect()->route('district.index')->with('success', 'District deleted successfully.');
    }
}
