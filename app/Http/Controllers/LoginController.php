<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;;

class LoginController extends Controller
{

    public function index()
    {
        return '这是登录';
    }

    public function store(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();
        $userPassword = $user->password;

        if (!password_verify($password, $userPassword)) {
            return response()->json(['Unauthorized'], 401);
        }

        return response()->json([
            'access_token' => $user->createToken($user->email)->plainTextToken
        ]);
    }

    public function me(Request $request)
    {
        return $request->user();
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer'
        ]);
    }

}
