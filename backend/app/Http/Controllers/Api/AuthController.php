<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(LoginRequest $request) {
        try {

            $credentials = $request->only(["email", "password"]);
            if(Auth::attempt($credentials)) {
                $user = User::whereEmail($request->email)->first();
                $token = $user->createToken($user->id."-AuthToken")->plainTextToken;

                return ApiResponse::success([
                    "user"  =>  UserResource::make($user),
                    "token" =>  $token
                ], "Login successfull");
            }
            
            throw new Exception("Invalid credentials");

        } catch (Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function register(RegisterRequest $request) {
        try {

            $validated = $request->validated();

            User::create($validated);

            return ApiResponse::success(message: "Registration successfull");

        } catch (Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function logout(Request $request) {
        try {

            $request->user()->tokens()->delete();

            return ApiResponse::success(message: "Logout Successfull.");

        } catch (Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }
}
