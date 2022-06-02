<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request) {
        $user = User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'is_admin'      => $request->is_admin,
            'password'      => Hash::make($request->password),
        ]);
        // Make token
        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'message'       => 'Success',
            'user'          => $user,
            'meta'          => [
                'token'     => $token
            ]
        ], Response::HTTP_CREATED);
    }

    public function login(LoginRequest $request) {

        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken($request->device_name)->plainTextToken;
                return response([
                    'message' => 'Successfully logged in!',
                    'user' => $user,
                    'token' => [
                        'token' => $token
                    ]
                ], Response::HTTP_CREATED);
            } else {
                return response([
                    'message' => 'Wrong password!'
                ], Response::HTTP_UNAUTHORIZED);
            }
        } else {
            return response([
                'message' => 'User not found!'
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function logout(Request $request) {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out!'
        ], Response::HTTP_OK);
    }
}
