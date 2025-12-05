<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Helpers\ApiResponse;

class AuthController extends Controller
{

    // public function register(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:100',
    //         'email' => 'required|string|email|unique:users',
    //         'password' => 'required|min:6',
    //     ]);

    //     $user = User::create([
    //         'name' => $validated['name'],
    //         'email' => $validated['email'],
    //         'password' => Hash::make($validated['password']),
    //     ]);

    //     $token = $user->createToken('auth_token')->plainTextToken;

    //     return ApiResponse::success([
    //         'user' => $user,
    //         'token' => $token
    //     ], 'User registered successfully', 201);
    // }

    // public function login(Request $request)
    // {
    //     $validated = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     $user = User::where('email', $validated['email'])->first();

    //     if (! $user || ! Hash::check($validated['password'], $user->password)) {
    //         return ApiResponse::error('Invalid email or password', [], 401);
    //     }

    //     $token = $user->createToken('auth_token')->plainTextToken;

    //     return ApiResponse::success([
    //         'user' => $user,
    //         'token' => $token
    //     ], 'Login successful');
    // }

    // public function user(Request $request)
    // {
    //     return ApiResponse::success($request->user(), 'User fetched successfully');
    // }

    // public function logout(Request $request)
    // {
    //     $request->user()->tokens()->delete();
    //     return ApiResponse::success([], 'Logged out successfully');
    // }
}
