<?php

namespace App\Http\Controllers;

use App\Http\Requests\Like\UpdateRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Redis;

/**
 * Class LikeController
 * @package App\Http\Controllers
 */
class LikeController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request)
    {
        $articleId = $request->input('article');
        $like = Redis::get('article:likes:'.$articleId);
        if (empty($like)) {
            $article = Article::find($articleId);
            if ($article) {
                $like = $article->first()->likes;
            } else {
                abort(404);
            }
        }
        Redis::set('article:likes:'.$articleId, ++$like);
        return response()->json(['likes' => $like, 'article' => $articleId]);
    }
}
