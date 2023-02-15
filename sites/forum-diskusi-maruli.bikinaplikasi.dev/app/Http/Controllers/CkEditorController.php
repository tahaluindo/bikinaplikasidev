<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CkEditorController extends Controller
{
    public function upload(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'upload' => 'required|mimes:jpg,jpeg,png,bmp|max:1000',
        ]);

        if ($validator->fails()) {
            $error = implode(",", collect($validator->errors())->toArray()['upload']);

            return "<script>window.parent.CKEDITOR.tools.callFunction($request->CKEditorFuncNum, '', '$error')</script>";
        }

        $url = url("storage/" . $request->file('upload')->store('post-images'));

        return "<script>window.parent.CKEDITOR.tools.callFunction($request->CKEditorFuncNum, '$url', 'Success')</script>";
    }
}
