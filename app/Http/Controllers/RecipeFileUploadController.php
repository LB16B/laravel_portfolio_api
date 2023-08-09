<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class RecipeFileUploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            // ファイルがアップロードされた場合
            $file = $request->file('file');

            // トリミング情報を取得
            $x = $request->input('x');
            $y = $request->input('y');
            $height = $request->input('height');
            $with = $request->input('with');

            // 画像加工
            $trimmingFile = Image::make($file);
            $file->crop($width, $height, $x, $y);

            
            // ファイルを保存するディレクトリを指定（任意のディレクトリに変更する）
            $uploadPath = public_path('recipe_images');
            
            $jstDateTime = date('YmdHi', strtotime('+ 9 hours', time()));
            $fileName = $jstDateTime . '_' . $file->getClientOriginalName();
            // $file->save($uploadPath, $fileName);
            
            $file->save($uploadPath . '/' . $fileName);

            return response()->json(['message' => 'File uploaded successfully.', 'filename' => $fileName]);
        } else {
            return response()->json(['message' => 'No file uploaded.'], 400);
        }
        
    }
}
