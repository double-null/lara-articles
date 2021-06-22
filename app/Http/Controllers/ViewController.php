<?php

namespace App\Http\Controllers;

use App\Http\Requests\Like\UpdateRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;

/**
 * Class ViewController
 * @package App\Http\Controllers
 */
class ViewController
{
    public function update(UpdateRequest $request)
    {
        $article = new Article();
        $article->id = $request->input('article');
        $realtime_views = $article->getRealtimeViews();
        if (!$realtime_views) {
            $articleStatic = Article::find($article->id);
            if ($articleStatic) {
                $article->realtime_views = $articleStatic->first()->likes;
            } else {
                abort(404);
            }
        }
        $article->realtime_views = ++$realtime_views;
        return new ArticleResource($article);
    }
}
