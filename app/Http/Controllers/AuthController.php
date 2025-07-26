<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6']
        ]);

        $user = User::where('email', $validated["email"])->first();
        if (!$user) {
            return response()->json(['message' => "Username is not found."], 404);
        }

        if (!$user || !Hash::check($validated["password"], $user->password)) {
            return response()->json(["message" => "Password is incorrect."], 422);
        }
        $token = $user->createToken($validated['email'])->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'token' => $token
        ]);
    }
    public function changePassword(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'User id is not found'], 404);
        }
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirmed_password' => 'required|same:new_password'
        ]);
        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json(["message" => "Old password is incorrect."], 422);
        }
        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json(['id' => $user->id, 'message' => 'Password successfully updated.']);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            "message" => "LogOut is successfully",
        ]);
    }
}
