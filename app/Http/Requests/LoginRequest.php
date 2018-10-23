<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            //
            'email'    => 'required|email',
            'password' => 'required|min:3',
        ];
    }
    
    public function messages()
    {
        return [
            'email.required' => 'Account ha??',
            'email.email' => 'Account Type wrong! Must be an Email',
            'password.required' => 'Tell me the Code!',
            'password.min' => 'password is short',
        ];
        
    }
}
