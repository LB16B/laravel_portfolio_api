<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecipeFileUploadController extends Controller
{
    public function upload(Request $request)
    {

        if ($request->hasFile('file')) {
            // ファイルがアップロードされた場合
            $file = $request->file('file');

            // ファイルを保存するディレクトリを指定（任意のディレクトリに変更する）
            $uploadPath = public_path('uploads');

            // ファイルの保存
            // $fileName = time() . '_' . $file->getClientOriginalName();
            $jstDateTime = date('YmdHi', strtotime('+ 9 hours', time()));
            $fileName = $jstDateTime . '_' . $file->getClientOriginalName();
            $file->move($uploadPath, $fileName);

            return response()->json(['message' => 'File uploaded successfully.', 'filename' => $fileName]);
        } else {
            return response()->json(['message' => 'No file uploaded.'], 400);
        }
    }
}
