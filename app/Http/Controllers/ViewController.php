<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Redis;

class ViewController
{
    public function update()
    {
        $article = request('article');
        $views = Redis::get('article:views:'.$article);
        if (empty($views)) {
            $views = Article::find($article)->first()->views;
        }
        Redis::set('article:views:'.$article, ++$views);
        return response()->json(['views' => $views, 'article' => $article]);
    }
}
