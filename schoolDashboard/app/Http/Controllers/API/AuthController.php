<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // role-specific token
        $tokenName = strtoupper($user->role);
        $abilities = $this->getAbilitiesForRole($user->role);

        return response()->json([
            'token' => $user->createToken($tokenName, $abilities)->plainTextToken,
            'user' => $user,
            'abilities' => $abilities
        ]);
    }

    public function logout(Request $request)
    {
        try {
            // current access token
            $token = $request->user()->currentAccessToken();
            $token->delete();

            return response()->json(['message' => 'Logged out successfully']);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Logout failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    protected function getAbilitiesForRole($role)
    {
        return match($role) {
            User::ROLE_ADMIN => ['*'],
            User::ROLE_PARENT => [
                'parent',
                'parent:view-self',
                'parent:update-self',
                'student:view-own',
                'trip:*',
                'van:view',
                'driver:view'
            ],
            User::ROLE_DRIVER => [
                'driver',
                'trip:*',
                'van:view',
                'operator:view'
            ],
            User::ROLE_OPERATOR => [
                'operator',
                'trip:*',
                'van:view',
                'driver:view'
            ],
            default => ["none"]
        };
    }
}
