<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Redis;

class ArticleController extends Controller
{
    public function index()
    {
        if (request('tag')) {
            $tag = Tag::find(request('tag'));
            $articles = $tag->articles()->paginate(10);
        } else {
            $articles = Article::orderBy('id', 'desc')->paginate(10);
        }

        foreach ($articles as $article) {
            $views = Redis::get('article:views:'.$article->id);
            if (empty($views)) {
                $views = $article->views;
            }
            Redis::set('article:views:'.$article->id, ++$views);
            $article->views = $views;
            $article->likes = Redis::get('article:like:'.$article->id) ?? $article->likes;
        }
        $tags = Tag::all();
        return view('articles.list', compact('articles', 'tags'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();
        if (!empty($article)) {
            $views = Redis::get('article:views:'.$article->id);
            if (empty($views)) {
                $views = $article->views;
            }
            Redis::set('article:views:'.$article->id, ++$views);
            $article->views = $views;
            $article->likes = Redis::get('article:like:'.$article->id) ?? $article->likes;
        }
        return view('articles.show', compact('article'));
    }

    public function like()
    {
        $id = request('id');
        $article = Article::find($id);
        $article->increment('likes');
    }
}
