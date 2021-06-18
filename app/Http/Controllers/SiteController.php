<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;

class SiteController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->take(6)->get();
        $tags = Tag::all();
        return view('site.index', compact('articles', 'tags'));
    }
}
