<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'article_id' => 'required|integer|exists:App\Models\Article,id',
            'title' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Тема комментария не заполнена',
            'content.required' => 'Комментарий не заполнен',
            'article_id.required' => 'Публикация не выбрана',
            'article_id.integer' => 'Не верный формат публикации',
            'article_id.exists' => 'Публикации не существует',
        ];
    }
}
