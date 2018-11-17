<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'fname'    => 'required|max:30',
            'lname'    => 'required|max:30',
            'address'    => 'required',
            'suburb'    => 'required',
            'city'    => 'required',
            'phone'    => 'required|numeric',
            'zipcode'    => 'required|numeric',
        ];
    }
}
