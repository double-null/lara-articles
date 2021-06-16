<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;

class ArticleController extends Controller
{
    public function index()
    {
        if (request('tag')) {
            $tag = Tag::find(request('tag'));
            $articles = $tag->articles()->paginate(20);
        } else {
            $articles = Article::orderBy('id', 'desc')->paginate(20);
        }
        $tags = Tag::all();
        return view('articles.list', compact('articles', 'tags'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();
        return view('articles.show', compact('article'));
    }

    public function like()
    {
        $id = request('id');
        $article = Article::find($id);
        $article->increment('likes');
    }
}
