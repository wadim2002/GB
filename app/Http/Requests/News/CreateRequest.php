<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use App\enums\NewsStatus;

class CreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules():array
    {
        return [
            'title'=>['required', 'min:5', 'max:200'],
             //'category_id'=>['required', 'array'],
             //'category_id.id'=>['exists:categories,id'],
             'author'=>['nullable', 'string', 'min:5', 'max:50'],
             'image'=>['sometimes'],
             'description' => ['nullable', 'string', 'min:3'],
             'status'=>['required', new Enum(NewsStatus::class)],
             'sours'=>['nullable', 'string', 'min:5', 'max:50'],
        ];
    }
}
