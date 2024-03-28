<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class RegisterController extends BaseController
{
    #[Route('api/v1/register')]
    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            $validatedData = $request->validated();
            $validatedData['password'] = bcrypt($validatedData['password']);

            $user = User::create($validatedData);
            $token = $user->createToken('register token')->plainTextToken;
            $response = [
                'token' => $token,
                'name' => $user->name
            ];

            return $this->sendResponse($response, 'User registered successfully.');
        } catch (\Exception $e) {

            return $this->sendError('Registration failed.', [$e->getMessage()]);
        }
    }


    #[Route('api/v1/login')]
    public function login(Request $request): JsonResponse
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            $token = $user->createToken($user->name . '-AuthToken')->plainTextToken;

            $success = [
                'access_token' => $token
            ];
            return $this->sendResponse($success, 'User login successful.');
        } else {
            return $this->sendError('Unauthorized.', ['error' => 'Unauthorized'], JsonResponse::HTTP_UNAUTHORIZED);
        }
    }

    #[Route('api/v1/logout')]
    public function logout(Request $request)
    {

        auth()->user()->tokens()->delete();

        return response()->json(['message' => 'Successfully logged out']);

    }

}
