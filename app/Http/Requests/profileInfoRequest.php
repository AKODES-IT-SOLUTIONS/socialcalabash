<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class profileInfoRequest extends FormRequest
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
        $id = Auth::guard('web')->user()->id;
        return [
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' =>[
                    'required',
                    Rule::unique('users')->ignore($id),
                ],
                'password'=>'nullable|string|confirmed|min:4',
                'password_confirmation' => 'nullable|string|min:4' 
            
        ];
    }
}
