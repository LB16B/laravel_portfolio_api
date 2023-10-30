<?php

namespace App\Http\Controllers\Api\V2;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\StoreUserProfileRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Http\Resources\UserProfileResource;
use App\Models\User;

class UserProfileController extends Controller
{
    public function update(UpdateUserProfileRequest $request)
    {
        $user = auth()->user(); // ログインしているユーザーを取得

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'filename' => $request->input('filename'),
            // 他のプロフィールフィールドの更新も追加できます
        ]);

        return response()->json(['message' => 'UserProfile updated successfully']);
    }
}