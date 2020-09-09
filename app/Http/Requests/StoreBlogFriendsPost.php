<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogFriendsPost extends FormRequest
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
            'friends_title' => 'bail|required|max:40',
            'friends_link' => 'bail|required|url|max:40|unique:blog_friends',
            'friends_contact' => 'bail|required|max:40',
        ];
    }

    public function attributes()
    {
        return [
            'friends_title' => '博客名称',
            'friends_link' => '博客网址',
            'friends_contact' => '联系方式',
        ];
    }
}
