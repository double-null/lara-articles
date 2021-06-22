<?php

namespace App\Http\Requests\View;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'article' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'article.required' => 'ID статьи не должен быть пустым',
            'article.integer' => 'Не верный номер статьи',
        ];
    }
}
