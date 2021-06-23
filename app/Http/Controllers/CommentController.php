<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\CreateRequest;
use App\Jobs\SendComment;

class CommentController extends Controller
{
    public function store(CreateRequest $request)
    {
        SendComment::dispatch($request->validated());
        return response()->noContent();
    }
}
