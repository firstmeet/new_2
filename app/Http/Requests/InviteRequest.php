<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InviteRequest extends FormRequest
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
            'email'=>['required','email']
        ];
    }
    public function messages()
    {
        return [
            'email.email'=>__t("15423383514573"),
            'email.required'=>__t("15574792989207")
        ];
    }
}
