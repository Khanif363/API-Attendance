<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function reset(PasswordRequest $request) {
        if(Hash::check($request->password_old, $request->user()->password)) {
            if(!Hash::check($request->password, $request->user()->password)) {
                $request->user()->update(['password' => Hash::make($request->password)]);
                    return response()->json([
                        'message' => 'Password updated successfully'
                    ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'message' => 'New password cannot be the same as the old one.'
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }

        return response()->json([
            'message' => 'Password update failed'
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
