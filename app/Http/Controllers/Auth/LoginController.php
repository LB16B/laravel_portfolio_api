<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
// use Dotenv\Exception\ValidationException;
use Illuminate\Validation\ValidationException;
use App\Models\PaidMember;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        // $user = User::where('email', $request->email)->first();

        // if (!$user || !Hash::check($request->password, $user->password)) {
        //     throw ValidationException::withMessages([
        //         'email' => ['The credentials you entered are incorrect.']
        //     ]);
        // }

        if (!auth()->attempt($request->only(['email', 'password']))) {
            throw ValidationException::withMessages([
                'email' => ['The credentials you entered are incorrect.']
            ]);
        }
    }
}
