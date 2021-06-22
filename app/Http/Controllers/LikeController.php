<?php

namespace App\Http\Controllers;

use App\Http\Requests\Like\UpdateRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;

/**
 * Class LikeController
 * @package App\Http\Controllers
 */
class LikeController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @return ArticleResource
     */
    public function update(UpdateRequest $request)
    {
        $article = new Article();
        $article->id = $request->input('article');
        $realtime_likes = $article->getRealtimeLikes();
        if (!$realtime_likes) {
            $articleStatic = Article::find($article->id);
            if ($articleStatic) {
                $article->realtime_likes = $articleStatic->first()->likes;
            } else {
                abort(404);
            }
        }
        $article->realtime_likes = ++$realtime_likes;
        return new ArticleResource($article);
    }
}
