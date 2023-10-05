<?php

namespace App\Http\Controllers\Api\V2;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = auth()->user();
    
        if ($user) {
            if (!Hash::check($request->input('current_password'), $user->password)) {
                return response()->json(['error' => 'Current password is incorrect'], 401);
            }
    
            $user->password = Hash::make($request->input('new_password'));
            $user->save();
    
            return response()->json(['message' => 'Password changed successfully']);
        } else {
            return response()->json(['error' => 'User is not authenticated'], 401);
        }
    }
    
}