<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'poster_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'genres' => 'required|array'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле "Название" обязательно для заполнения.',
            'poster_url.image' => 'Файл должен быть изображением.',
            'poster_url.mimes' => 'Допустимые форматы: jpeg, png, jpg, gif.',
            'genres.required' => 'Выберите хотя бы один жанр.'
        ];
    }
}
