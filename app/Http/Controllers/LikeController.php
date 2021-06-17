<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redis;


class LikeController extends Controller
{
    public function update()
    {
        $article = request('article');
        /*
            $liked = Cookie::get('liked');
            if (!empty($liked) && in_array($article, $liked)) {
                $key = array_search($article, $liked);
                unset($liked[$key]);
            } else {
                $liked[] = $article;
            }
            cookie('liked', $liked, 525600);
        */
        $like = Redis::get('article:like:'.$article);
        if (empty($like)) {
            $like = Article::find($article)->first()->likes;
        }
        Redis::set('article:like:'.$article, ++$like);
        return response()->json(['likes' => $like, 'article' => $article]);
    }

    public function store(/*CreateRequest $request*/)
    {

    }
}
