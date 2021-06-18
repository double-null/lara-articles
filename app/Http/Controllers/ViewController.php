<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Redis;

class ViewController
{
    public function update()
    {
        $article = request('article');
        $view = Redis::get('article:view:'.$article);
        if (empty($view)) {
            $view = Article::find($article)->first()->views;
        }
        Redis::set('article:view:'.$article, ++$view);
        return response()->json(['likes' => $view, 'article' => $article]);
    }
}
