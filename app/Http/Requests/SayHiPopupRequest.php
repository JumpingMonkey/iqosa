<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SayHiPopupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:250',
            'last_name' => 'string|max:500',
            'email' => 'required|email|max:250',
            'message' => 'required|string|max:1000',
        ];
    }
}
