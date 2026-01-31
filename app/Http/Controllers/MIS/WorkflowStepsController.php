<?php

namespace App\Http\Controllers\MIS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MIS\ApprovalWorkflow;
use Spatie\Permission\Models\Role;

class WorkflowStepsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ApprovalWorkflow $workflow)
    {
        $breadcrumb = [
            'title' => "Documents",
            'items' => ["Home"],
            'last_item' => "Documents"
        ];
        return view('mis.workflow_steps.index', compact('breadcrumb', 'workflow'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ApprovalWorkflow $workflow)
    {
        $breadcrumb = [
            'title' => "Documents",
            'items' => ["Home"],
            'last_item' => "Documents"
        ];

        $roles = Role::where('status', 'mis')->pluck('name', 'id');
        return view('mis.workflow_steps.create', compact('breadcrumb', 'workflow', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ApprovalWorkflow $workflow)
    {
        $steps = $request->steps;
        // dd($steps);
        $workflow->steps()->createMany($steps);

        return redirect()->back()->with('success', 'Workflow steps added successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
