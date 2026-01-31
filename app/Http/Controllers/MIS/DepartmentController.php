<?php

namespace App\Http\Controllers\MIS;

use App\Http\Controllers\Controller;
use App\Http\Requests\MIS\DepartmentRequest;
use App\Models\MIS\Department;
use App\Models\MIS\Sector;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = [
            'title' => "Departments",
            'items' => ["Home"],
            'last_item' => "Departments"
        ];
        $departments = Department::with('sector')->get();

        return view('mis.departments.index', compact('departments', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = [
            'title' => "Add Department",
            'items' => ["Home", "Departments"],
            'last_item' => "Add Department"
        ];
        $sectors = Sector::where('status', "1")->get();

        return view('mis.departments.create', compact('breadcrumb', 'sectors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        $department = Department::create([
            "sector_id" => $request->sector_id,
            "name" => $request->name,
            "sanctioned" => $request->sanctioned,
            "released" => $request->released,
            "utilised" => $request->utilised,
        ]);

        return redirect()->back()->with('success', 'Department created successfully');
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
    public function edit(Department $department)
    {
        $breadcrumb = [
            'title' => "Edit Department",
            'items' => ["Home", "Departments"],
            'last_item' => "Edit Department"
        ];
        $sectors = Sector::where('status', "1")->get();

        return view('mis.departments.edit', compact('breadcrumb', 'sectors', 'department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        $department->update([
            "sector_id" => $request->sector_id,
            "name" => $request->name,
            "sanctioned" => $request->sanctioned,
            "released" => $request->released,
            "utilised" => $request->utilised,
        ]);

        return redirect()->back()->with('success', 'Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
    }

    public function activate(Department $department){
        $department->update(['status'=>1]);
        return redirect()->back()->with('success', 'Department activated successfully');
    }

    public function deactivate(Department $department){
        $department->update(['status'=>0]);
        return redirect()->back()->with('success', 'Department deactivated successfully');
    }
}
