<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogSubscribePost extends FormRequest
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
            'email_name' => 'required|email|unique:blog_subscribes,email'
        ];
    }

    public function attributes()
    {
        return [
            'email_name' => '订阅邮箱'
        ];
    }
}
