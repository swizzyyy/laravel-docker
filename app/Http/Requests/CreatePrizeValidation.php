<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePrizeValidation extends FormRequest
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
            'name' => 'required|string',
            'type' => 'required|in:custom_prize,lottery_ticket'
        ];
    }
    public function messages(): array
    {
        return [
            'required' => ':attribute Required!',
            'string' => ':attribute Must be a string!'
        ];
    }

}
