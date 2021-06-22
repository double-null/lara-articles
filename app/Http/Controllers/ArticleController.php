<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;

/**
 * Class ArticleController
 * @package App\Http\Controllers
 */
class ArticleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tagId = request('tag');
        if ($tagId) {
            $tag = Tag::find($tagId) ?? abort(404);
            $articles = $tag->articles()->orderBy('id', 'desc')->paginate(10);
        } else {
            $articles = Article::orderBy('id', 'desc')->paginate(10);
        }
        $tags = Tag::all();
        return view('articles.list', compact('articles', 'tags', 'tagId'));
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first() ?? abort(404);
        return view('articles.show', compact('article'));
    }
}
