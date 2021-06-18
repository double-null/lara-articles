<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Redis;

class LikeController extends Controller
{
    public function update()
    {
        $article = request('article');
        $like = Redis::get('article:like:'.$article);
        if (empty($like)) {
            $like = Article::find($article)->first()->likes;
        }
        Redis::set('article:like:'.$article, ++$like);
        return response()->json(['likes' => $like, 'article' => $article]);
    }
}
