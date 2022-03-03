<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class UpdareFormRequest extends FormRequest
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
            'password' => 'required|min:5|max:255',
            'email' => 'required|email',
            'phonenumber' => 'required|digits:10'
        ];
    }
}
