<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleMsgPost extends FormRequest
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
            'msg_content' => 'required',
            'msg_blog_name' => 'required|max:40',
            'msg_blog_link' => 'required|url',
            'msg_blog_contact' => 'required|max:40',
            'foreign_id' => 'required|integer',
            'msg_type' => 'required|integer',
        ];
    }

    public function attributes()
    {
        return [
            'msg_content' => '留言内容',
            'msg_blog_name' => '博客名称',
            'msg_blog_link' => '博客网址',
            'msg_blog_contact' => '联系方式',
            'foreign_id' => '参数ID',
            'msg_type' => '留言板块'
        ];
    }
}
