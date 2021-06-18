<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Redis;

class ArticleController extends Controller
{
    public function index()
    {
        $tagId = request('tag');
        if ($tagId) {
            $tag = Tag::find($tagId);
            $articles = $tag->articles()->orderBy('id', 'desc')->paginate(10);
        } else {
            $articles = Article::orderBy('id', 'desc')->paginate(10);
        }

        foreach ($articles as $article) {
            $views = Redis::get('article:views:'.$article->id);
            if (empty($views)) {
                $views = $article->views;
            }
            $article->views = $views;
            $article->likes = Redis::get('article:like:'.$article->id) ?? $article->likes;
        }
        $tags = Tag::all();
        return view('articles.list', compact('articles', 'tags', 'tagId'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();
        if (!empty($article)) {
            $views = Redis::get('article:views:'.$article->id);
            if (empty($views)) {
                $views = $article->views;
            }
            $article->views = $views;
            $article->likes = Redis::get('article:like:'.$article->id) ?? $article->likes;
        }
        return view('articles.show', compact('article'));
    }
}
