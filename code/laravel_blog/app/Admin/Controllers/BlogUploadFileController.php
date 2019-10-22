<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogUploadFile;

class BlogUploadFileController extends Controller
{

    public function store(Request $request, BlogUploadFile $blogUploadFile)
    {
        $type = $request->input('type');
        if ($type == 1) {
            if ($request->file('editormd-image-file')) {
                $file_data                  = $request->file('editormd-image-file');
                $save_src                   = $request->file('editormd-image-file')->store('article' . '/' . date('Y-m-d'), 'admin');
                $blogUploadFile->img_title  = $file_data->getClientOriginalName();
                $blogUploadFile->img_src    = $save_src;
                $blogUploadFile->img_suffix = $file_data->extension();
                $blogUploadFile->img_type   = $type;
                $blogUploadFile->img_ip     = $request->getClientIp();
                $bool1                      = $blogUploadFile->save();
                if ($bool1) {
                    $save_src = 'uploads/' . $save_src;
                    $result   = array(
                        'success' => 1,
                        'message' => '上传成功',
                        'url'     => asset($save_src)
                    );
                } else {
                    $result = array(
                        'success' => 0,
                        'message' => '上传失败'
                    );
                }
                return json_encode($result);
            }
        } elseif ($type == 2) {
            if ($request->file('simditor_file')) {
                $file_data                  = $request->file('simditor_file');
                $save_src                   = $request->file('simditor_file')->store('simditor' . '/' . date('Y-m-d'), 'admin');
                $blogUploadFile->img_title  = $file_data->getClientOriginalName();
                $blogUploadFile->img_src    = $save_src;
                $blogUploadFile->img_suffix = $file_data->extension();
                $blogUploadFile->img_type   = $type;
                $blogUploadFile->img_ip     = $request->getClientIp();
                $bool1                      = $blogUploadFile->save();
                if ($bool1) {
                    $save_src = 'uploads/' . $save_src;
                    $result   = array(
                        'success'   => true,
                        'file_path' => asset($save_src)
                    );
                } else {
                    $result = array(
                        'success' => false
                    );
                }
                return json_encode($result);
            }
        }
        $result = array(
            'success' => 0,
            'message' => '上传失败'
        );
        return json_encode($result);
    }
}
