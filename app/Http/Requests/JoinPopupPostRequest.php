<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JoinPopupPostRequest extends FormRequest
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
            'name' => 'required|string|max:250',
            'vacancy' => 'required|string|max:500',
            'email' => 'required|email|max:250',
//            'file'=> 'sometimes|mimes:pdf,doc,docx|max:50000000',
            'linkedin' => 'required|string|max:250',
        ];
    }

//    public function messages()
//    {
//
//        return [
//            'name.required' => 'A title is required111',
//            'vacancy.required' => 'A title is required1112222',
//        ];
//    }
}
