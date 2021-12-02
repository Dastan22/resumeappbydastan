<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' =>'required|max:255',
            'date_of_birth' =>'required|max:255',
            'email' =>'required|max:255|unique:users',
            'phoneNumber' =>'required|min:8|max:15',
            'password' =>'required|min:8|max:255',
        ];
    }
}
