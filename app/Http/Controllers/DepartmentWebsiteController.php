<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentWebsiteRequest;
use App\Models\Document;
use Illuminate\Http\Request;

class DepartmentWebsiteController extends Controller
{
    public function __construct()
    {
        // Protect entire controller
        $this->middleware('permission:view department-website')->only(['index']);
        $this->middleware('permission:create department-website')->only(['create', 'store']);
        $this->middleware('permission:update department-website')->only(['edit', 'update']);
        $this->middleware('permission:delete department-website')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = [
            'title' => "Department Website",
            'items' => ["Home"],
            'last_item' => "Department Website"
        ];
        $document = Document::where('category', 'department_website')->orderBy('id', 'desc')->paginate(20);
        return view('department-website.index', compact('document', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = [
            'title' => "Add Department Website",
            'items' => ["Home", "Department Website"],
            'last_item' => "Add Department Website"
        ];
        return view('department-website.create', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentWebsiteRequest $request)
    {
        $data = $request->only(['url']);
        $document = Document::create([
            "name"=>$request->name,
            "data"=>json_encode($data),
            "category"=> $request->category,
        ]);

        return redirect()->route('department-website.index')->with('success','Department Website added successfully.');
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
    public function edit(Document $departmentWebsite)
    {
        $breadcrumb = [
            'title' => "Edit Department Website",
            'items' => ["Home", "Department Website"],
            'last_item' => "Edit Department Website"
        ];
        return view('department-website.update', compact('departmentWebsite', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentWebsiteRequest $request, Document $departmentWebsite)
    {
        $data = $request->only(['url']);

        $departmentWebsite->update([
            "name"=>$request->name,
            "data"=>json_encode($data),
            "category"=> $request->category,
        ]);

        return redirect()->route('department-website.index')->with('success','Department Website updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $departmentWebsite)
    {
        $departmentWebsite->delete();
        return redirect()->route('department-website.index')->with('success','Department Website deleted successfully.');
    }
}
