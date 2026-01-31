<?php

namespace App\Http\Controllers\MIS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MIS\ApprovalWorkflow;

class WorkflowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = [
            'title' => "Documents",
            'items' => ["Home"],
            'last_item' => "Documents"
        ];
        $workflow = ApprovalWorkflow::get();
        return view('mis.workflow.index', compact('breadcrumb', 'workflow'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|regex:/^[A-Za-z0-9 ]+$/|max:200'
        ]);

        $workflow = new ApprovalWorkflow($request->all());
        $workflow->save();
        return redirect()->back()->with('success', 'Workflow Created Successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ApprovalWorkflow $workflow)
    {
        $request->validate([
            'name' => 'required|string|regex:/^[A-Za-z0-9 ]+$/|max:200'
        ]);

        $workflow->name = $request->name;
        $workflow->update();
        return redirect()->back()->with('success', 'Workflow Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApprovalWorkflow $workflow)
    {
        $workflow->delete();
        return redirect()->back()->with('success', 'Workflow Delete Successfully.');
    }
}
