<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'current_password' => 'required', 
            'new_password' => 'required|string|min:8|different:current_password', 
            'new_password_confirmation' => 'required|string|same:new_password', 
        ];
    }
}