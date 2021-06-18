<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\CreateRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(CreateRequest $request)
    {
        (new Comment())->create($request->all());
        return response()->json(['success' => 1]);
    }
}
