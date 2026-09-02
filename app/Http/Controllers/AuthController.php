<?php

namespace App\Http\Controllers;

use App\Http\requests\userLoginRequest;
use App\Http\resources\userResource;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(userLoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials'
            ], 401);
        }
        $user = Auth::user();
        $token = $user->createToken('api-token')->plainTextToken;
        return response()->json([
            'success' => true,
            'message' => 'login successful',
            'data' => [
                'user' => new userResource($user),
                'token' => $token,
            ],
        ]);
    }
}
