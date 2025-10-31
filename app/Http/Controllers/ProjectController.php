<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Models\Page;
use App\Models\Department;

class ProjectController extends Controller
{
    public function __construct()
    {
        // Protect entire controller
        $this->middleware('permission:view project')->only(['index']);
        $this->middleware('permission:create project')->only(['create', 'store']);
        $this->middleware('permission:update project')->only(['edit', 'update']);
        $this->middleware('permission:delete project')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = [
            'title' => "Project List",
            'items' => ["Home"],
            'last_item' => "Project"
        ];
        $projects = Project::orderBy('id', 'desc')->paginate(20);
        return view('project.index', compact('breadcrumb', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = [
            'title' => "Add Project",
            'items' => ["Home", "Project"],
            'last_item' => "Add Project"
        ];
        $pages = Page::where('page_type', 'Sector')->pluck('name', 'id');
        return view('project.create', compact('breadcrumb', 'pages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $data = $request->all();
        $project = New Project($data);
        $project->save();
        return redirect()->route('project.index')->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $breadcrumb = [
            'title' => "Edit Project",
            'items' => ["Home", "Project"],
            'last_item' => "Edit Project"
        ];
        $pages = Page::where('page_type', 'Sector')->pluck('name', 'id');
        
        return view('project.update', compact('project', 'breadcrumb', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $data = $request->all();
        $project->update($data);
        return redirect()->route('project.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('project.index')->with('success', 'Project deleted successfully.');
    }

    public function getDepartmentsBySector(Request $request)
    {
        $pageId = $request->input('page_id');
        $departments = Department::where('page_id', $pageId)->pluck('name', 'id');
        return response()->json($departments);
    }
}
