<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddAlbumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'image_preview'=>'required|mimes:png,jpg,jpeg,webp',
            'title'=>'required|max:253',
            'max'=>'Превышено максимальное количество символов',
            'mimes'=>'Изображение должно быть формата: png, jpeg, jpg',
        ];
    }
}
