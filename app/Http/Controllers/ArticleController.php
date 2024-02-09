<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', ['articles' => $articles]);
        return view('articles.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $article = new Article;
        return view('articles.create', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'published_date' => 'required|date',
        ]);

        $article = new Article;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->image = Storage::disk('public')->put('images', $request->image);
        $article->published_date = $request->published_date;
        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }


   
   /**
 * Display the specified resource.
 */
public function show($id)
{
    $article = Article::findOrFail($id);
    return view('articles.show', compact('article'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'published_date' => 'required|date',
        ]);

        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->content = $request->content;
        if ($request->hasFile('image')) {
            $article->image = Storage::disk('public')->put('images', $request->image);
        }
        $article->published_date = $request->published_date;
        $article->save();

        return redirect()->route('articles.index')
            ->with('success', 'Article updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Article deleted successfully');
    }
}
