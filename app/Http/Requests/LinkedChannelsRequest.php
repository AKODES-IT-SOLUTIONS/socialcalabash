<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkedChannelsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id'=>'required',
            'page_id'=>'required',
            'page_name'=>'required|string',
            'access_token'=>'required|string',
        ];
    }
}
