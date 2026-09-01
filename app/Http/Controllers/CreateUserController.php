<?php

namespace App\Http\Controllers;

use App\Http\requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class CreateUserController extends Controller
{
    public function createUser(CreateUserRequest $request)
    {
        $user = User::create($request->validated());
        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ], 201);
    }
}
