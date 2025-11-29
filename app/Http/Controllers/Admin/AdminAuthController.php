<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function login(Request $requesr){
        $validatedata = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', Request->email)->first();

        if( ! $user || ! Hash::check($rquest->password, $user->password)){
            throw ValidationException::withMessages([
                'message' => ['Invalid credentials'],
            ]);
        }

        if($user->role !== 'admin'){
            return response()->json([
                'message ' => 'Access denied! You are not an Admin.'
            ]);
        }

        $token = $user->createToken('admin_auth_token')->PlainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'brearer',
            'user' => $user
        ]);
    }

    public function logout(Request $request){
        $request->user()->token()->delete();
        return response()->json([
            'message' => 'Logout Successfully!'
        ]);
    }
}
