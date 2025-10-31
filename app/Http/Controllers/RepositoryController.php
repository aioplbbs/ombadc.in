<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepositoryRequest;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RepositoryController extends Controller
{
    public function __construct()
    {
        // Protect entire controller
        $this->middleware('permission:view repository')->only(['index']);
        $this->middleware('permission:create repository')->only(['create', 'store']);
        $this->middleware('permission:update repository')->only(['edit', 'update']);
        $this->middleware('permission:delete repository')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = [
            'title' => "Repository",
            'items' => ["Home"],
            'last_item' => "Repository"
        ];
        $document = Document::where('category', 'repository')->orderBy('id', 'desc')->paginate(20);
        return view('repository.index', compact('document', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = [
            'title' => "Add Repository",
            'items' => ["Home", "Repository"],
            'last_item' => "Add Repository"
        ];
        return view('repository.create', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RepositoryRequest $request)
    {
        $data = $request->only(['description', 'file_date']);
        $document = Document::create([
            "name"=>$request->name,
            "data"=>json_encode($data),
            "category"=> $request->category,
        ]);

        if($request->hasFile("document_file")){
            $file = $request->file("document_file");
            $document->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('documents');
        }

        if($request->hasFile("thumbnail")){
            $file = $request->file("thumbnail");
            $document->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('thumbnails');
        }

        return redirect()->route('repository.index')->with('success','Repository added successfully.');
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
    public function edit(Document $repository)
    {
        $breadcrumb = [
            'title' => "Edit Repository",
            'items' => ["Home", "Repository"],
            'last_item' => "Edit Repository"
        ];
        return view('repository.update', compact('repository', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RepositoryRequest $request, Document $repository)
    {
        $data = $request->only(['description', 'file_date']);

        if($request->hasFile("document_file")){
            $file = $request->file("document_file");
            $repository->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('documents');
        }

        if($request->hasFile("thumbnail")){
            $file = $request->file("thumbnail");
            $repository->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('thumbnails');
        }

        $repository->update([
            "name"=>$request->name,
            "data"=>json_encode($data),
            "category"=> $request->category,
        ]);

        return redirect()->route('repository.index')->with('success','Repository updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $repository)
    {
        $repository->delete();
        return redirect()->route('repository.index')->with('success','Repository deleted successfully.');
    }
}
