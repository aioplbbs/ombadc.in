<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;

class DepartmentController extends Controller
{
    public function __construct()
    {
        // Protect entire controller
        $this->middleware('permission:view department')->only(['index']);
        $this->middleware('permission:create department')->only(['create', 'store']);
        $this->middleware('permission:update department')->only(['edit', 'update']);
        $this->middleware('permission:delete department')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = [
            'title' => "Department List",
            'items' => ["Home"],
            'last_item' => "Department"
        ];
        $departments = Department::orderBy('id', 'desc')->paginate(20);
        return view('department.index', compact('departments', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = [
            'title' => "Add Department",
            'items' => ["Home", "Department"],
            'last_item' => "Add Department"
        ];
        $pages = Page::where('page_type', 'Sector')->pluck('name', 'id');
        return view('department.create', compact('breadcrumb', 'pages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        $data = $request->all();
        $department = New Department($data);
        $department->save();
        return redirect()->route('department.index')->with('success', 'Department created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
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
            'items' => ["Home", "Department"],
            'last_item' => "Edit Department"
        ];
        $pages = Page::where('page_type', 'Sector')->pluck('name', 'id');
        return view('department.update', compact('department', 'breadcrumb', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        $data = $request->all();
        $department->update($data);
        return redirect()->route('department.index')->with('success', 'Department updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('department.index')->with('success', 'Department deleted successfully.');
    }
}
