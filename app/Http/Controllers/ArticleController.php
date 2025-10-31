<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function __construct()
    {
        // Protect entire controller
        $this->middleware('permission:view article')->only(['index']);
        $this->middleware('permission:create article')->only(['create', 'store']);
        $this->middleware('permission:update article')->only(['edit', 'update']);
        $this->middleware('permission:delete article')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = [
            'title' => "Article",
            'items' => ["Home"],
            'last_item' => "Article"
        ];
        $document = Document::where('category', 'article')->orderBy('id', 'desc')->paginate(20);
        return view('article.index', compact('document', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = [
            'title' => "Add Article",
            'items' => ["Home", "Article"],
            'last_item' => "Add Article"
        ];
        return view('article.create', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->only(['url']);
        $document = Document::create([
            "name"=>$request->name,
            "data"=>json_encode($data),
            "category"=> $request->category,
        ]);

        if($request->hasFile("thumbnail")){
            $file = $request->file("thumbnail");
            $document->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('thumbnails');
        }

        return redirect()->route('article.index')->with('success','Article added successfully.');
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
    public function edit(Document $article)
    {
        $breadcrumb = [
            'title' => "Edit Article",
            'items' => ["Home", "Article"],
            'last_item' => "Edit Article"
        ];
        return view('article.update', compact('article', 'breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Document $article)
    {
        $data = $request->only(['url']);

        if($request->hasFile("thumbnail")){
            $file = $request->file("thumbnail");
            $article->addMedia($file)->usingFileName(Str::random(16) . '.' . $file->getClientOriginalExtension())->toMediaCollection('thumbnails');
        }

        $article->update([
            "name"=>$request->name,
            "data"=>json_encode($data),
            "category"=> $request->category,
        ]);

        return redirect()->route('article.index')->with('success','Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $article)
    {
        $article->delete();
        return redirect()->route('article.index')->with('success','Article deleted successfully.');
    }
}
