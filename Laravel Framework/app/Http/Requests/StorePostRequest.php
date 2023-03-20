<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
                'title'=> ['required','min:3'],
                'description' => ['required','min:10']
            ];

    }

    public function messages(): array
    {
        return [
            'title' => [
                'required' => 'A Title is Required',
                'min' => 'A Title must be larger than 3 Characters'
            ],
            'description' => [
                'required' => 'A Description is Required',
                'min' => 'A Description must be larger than 10 Characters'
            ]
        ];
    }
}