<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    public function __construct()
    {
        // Protect entire controller
        $this->middleware('permission:view document')->only(['index']);
        $this->middleware('permission:create document')->only(['create', 'store']);
        $this->middleware('permission:update document')->only(['edit', 'update']);
        $this->middleware('permission:delete document')->only(['destroy']);
    }
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
        $document = Document::where('category', 'document')->orderBy('id', 'desc')->paginate(20);
        return view('document.index', compact('document', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = [
            'title' => "Add Document",
            'items' => ["Home", "Document"],
            'last_item' => "Add Document"
        ];
        return view('document.create', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentRequest $request)
    {
        $data = $request->only(['description', 'file_date', 'type']);
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

        return redirect()->route('document.index')->with('success','Document added successfully.');
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
    public function edit(Document $document)
    {
        $breadcrumb = [
            'title' => "Edit Document",
            'items' => ["Home", "Document"],
            'last_item' => "Edit Document"
        ];
        return view('document.update', compact('document', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DocumentRequest $request, Document $document)
    {
        $data = $request->only(['description', 'file_date', 'type']);

        if($request->hasFile("document_file")){
            $file = $request->file("document_file");
            $document->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('documents');
        }

        if($request->hasFile("thumbnail")){
            $file = $request->file("thumbnail");
            $document->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('thumbnails');
        }

        $document->update([
            "name"=>$request->name,
            "data"=>json_encode($data),
            "category"=> $request->category,
        ]);

        return redirect()->route('document.index')->with('success','Document updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        $document->delete();
        return redirect()->route('document.index')->with('success','Document deleted successfully.');
    }
}
