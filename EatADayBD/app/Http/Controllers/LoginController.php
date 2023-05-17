<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function signUp(Request $request)
    {
        switch ($request) {
            case $request->has('name'):
                $data = $request->validate([
                    'name' => 'required',
                    'password' => 'required'
                ]);
                break;
            case $request->has('email'):
                var_dump('email');
                $data = $request->validate([
                    'email' => 'required',
                    'password' => 'required'
                ]);
                break;
        }

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ]);
        if (Auth::attempt($data)) {
            $token = Auth::user()->createToken("token")->accessToken;

            $response = [
                'success' => true,
                'message' => "You already had an account",
                'data' => $token
            ];
            return response()->json($response, 201);
        }
        var_dump(Str::random(40));
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mailToken' => Str::random(40),
            'password' => Hash::make($request->password)
        ]);
        $response = [
            'success' => true,
            'message' => "User created successfully",
            'data' => $user
        ];
        return response()->json($response, 201);

    }
    public function logIn(Request $request)
    {

        if (Auth::guard('api')->check()) {
            $response = [
                'success' => false,
                'message' => "You are already logged in",
                'data' => $request->bearerToken()
            ];
            return response()->json($response, 200);
        } else {
            $data = $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            if (Auth::attempt($data)) {
                $token = Auth::user()->createToken("token")->accessToken;
                $user = Auth::user();
                $user->token = $token;

                $response = [
                    'success' => true,
                    'message' => "You've been logged in successfully",
                    'data' => $user
                ];
                return response()->json($response, 201);
            } else {
                $response = [
                    'success' => false,
                    'message' => " {$request->name} doesn't exist or password is incorrect ",
                    'data' => null
                ];
                return response()->json($response, 401);
            }
        }
    }
    public function userInfo(Request $request)
    {
        $user = Auth::guard('api')->user();
        $response = [
            'success' => true,
            'message' => "Welcome, {$user->name}!",
            'data' => $user
        ];
        return response()->json($response, 200);
    }
    public function logOut(Request $request)
    {
        $user = Auth::guard('api')->user();
        $user->tokens()->delete();

        $response = [
            'success' => true,
            'message' => 'Logged out with success',
            'data' => $user
        ];
        return response()->json($response, 200);

    }
}
