<?php

namespace App\Http\Controllers\FrontEnd\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class UserAuthController extends Controller
{
    public function login(Request $request)
    {
        $validatedata = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $user = User::where("email", $request->email)->first();

        if (! $user || ! Hash::check($validatedata["password"], $user->password)) {
            throw ValidationException::withMessages([
                "message" => ['Invalid credentials'],
            ]);
        }

        if ($user->role !== 'user') {
            return response()->json([
                'message' => ['Access denied! You are not an user.'],
            ]);
        }

        $token = $user->createToken('user_auth_token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => $user,
        ], 201);
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email:rfc,dns|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        $token = $user->createToken('user_auth_token')->plainTextToken;

        return response()->json([
            'message'      => 'User Registered Successfully!',
            'access_token' => $token,
            'token_type' => 'bearer',
            'user'         => $user
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
