<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class APIAuthController extends Controller
{
    public function login(LoginRequest $request)
    {

        $user = Auth::user();

        $token = $user->createToken('authToken')->plainTextToken;

        return response([
            'user' => $user->only('name', 'email'),
            'access_token' => $token,
        ]);

        return response(['message' => 'Invalid email or password'], Response::HTTP_UNAUTHORIZED);
    }
}
