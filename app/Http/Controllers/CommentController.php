<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\CreateRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {

    }

    public function store(CreateRequest $request)
    {
        echo 1;
        die;
        (new Comment())->create($request->all());
        return response()->json('Ваш комментарий добавлен');
    }
}
