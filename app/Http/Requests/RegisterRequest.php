<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'fname'    => 'required|max:50',
            'lname'    => 'required|max:50',
            'password' => 'required|min:3|confirmed',
            'email'    => [
                'required',
                function ($attr, $value, $fail) {
                    if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $user = User::where('email', $value)->first();
                        if ($user) {
                            return $fail('Email is already registered.');
                        }
                    }
                    return true;
                },
            ],
            'code'     => [
                'required',
                function ($attr, $value, $fail) {
                    if ($value != session('valid_code.code')) {
                        return $fail('The code is invalide');
                    }else if (time() > session('valid_code.expired')){
                        return $fail('The code is expired');
                    };
                    return true;
                },
            ],
        ];
    }
}
