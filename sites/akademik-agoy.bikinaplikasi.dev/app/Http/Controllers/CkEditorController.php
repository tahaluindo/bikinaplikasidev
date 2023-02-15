<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CkEditorController extends Controller
{
    public function upload(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'upload' => 'required|mimes:jpg,jpeg,png,bmp',
        ]);

        if ($validator->fails()) {
            $error = implode(",", collect($validator->errors())->toArray()['upload']);

            return "<script>window.parent.CKEDITOR.tools.callFunction($request->CKEditorFuncNum, '', '$error')</script>";
        }

        $upload_destination = 'upload/' . $request->upload->getClientOriginalName();
        $request->upload->move('upload', $upload_destination);
        $url = url($upload_destination);

        return "<script>window.parent.CKEDITOR.tools.callFunction($request->CKEditorFuncNum, '$url', 'Success')</script>";
    }
}
