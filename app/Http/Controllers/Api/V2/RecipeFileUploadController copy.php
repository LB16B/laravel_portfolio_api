<?php

namespace App\Http\Controllers\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ImageIntervention;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\Recipe;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Response;
use App\Http\Requests\LoginRequest;
// use Dotenv\Exception\ValidationException;
use Illuminate\Validation\ValidationException;

class RecipeFileUploadController extends Controller
{
    public function upload(Request $request)
    {

        if (Session::token() !== $request->input('_token')) {
            // CSRFトークンが一致しない場合の処理
            abort(403, 'Unauthorized action.');
        }
        

        if ($request->hasFile('file')) {
            // ファイルがアップロードされた場合
            $file = $request->file('file');

            // トリミング情報を取得
            $x = $request->input('x');
            $y = $request->input('y');
            $height = $request->input('height');
            $width = $request->input('width');

            // ファイルを保存するディレクトリを指定（任意のディレクトリに変更する）
            $uploadPath = public_path('recipe_images');

            // ファイルの保存
            $fileName = time() . '_' . $file->getClientOriginalName();
            $jstDateTime = date('YmdHi', strtotime('+ 9 hours', time()));
            $fileName = $jstDateTime . '_' . $file->getClientOriginalName();      
            $file->move($uploadPath, $fileName);

            // トリミングした画像を作成
            $extension = strtolower($file->getClientOriginalExtension());
            if ($extension === 'jpeg' || $extension === 'jpg') {
                $image = imagecreatefromjpeg($uploadPath . '/' . $fileName);
            } elseif ($extension === 'png') {
                $image = imagecreatefrompng($uploadPath . '/' . $fileName);
            } else {
                // サポートされていないファイル形式の場合のエラーハンドリング
                return response()->json(['message' => 'Unsupported file format.'], 400);
            }

            $croppedImage = imagecrop($image, ['x' => $x, 'y' => $y, 'width' => $width, 'height' => $height]);

            // トリミングした画像を適切なフォーマットで保存
            if ($extension === 'jpeg' || $extension === 'jpg') {
                imagejpeg($croppedImage, $uploadPath . '/' . $fileName);
            } elseif ($extension === 'png') {
                imagepng($croppedImage, $uploadPath . '/' . $fileName);
            } else {
                
            }

            return response()->json(['message' => 'File uploaded successfully.', 'filename' => $fileName]);
        } else {
            return response()->json(['message' => 'No file uploaded.'], 400);
        }
    }
}

            
