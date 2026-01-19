<?php

namespace App\Http\Controllers\FrontEnd\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserAuthController extends Controller
{
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

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'      => 'User Registered Successfully!',
            'access_token' => $token,
            'user'         => $user
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
