<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('ngo')->get();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cleanData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => ['required','min:6'],
            'role' => 'required',
            'ngo_id' => 'nullable'
        ]);
        $cleanData['passwrod'] = Hash::make($cleanData['password']);
        $user = User::create($cleanData);
        return response()->json([
            "message" => "User created successfully",
            "id" => $user->id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('ngo')->find($id);
        if(!$user){
            return response()->json([
                "message" => "User not found"
            ], 404);
        }
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::with('ngo')->find($id);
        if(!$user){
            return response()->json([
                "message" => "User not found"
            ], 404);
        }

        $cleanData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
            'ngo_id' => 'nullable'
        ]);

        $user->update($cleanData);
        return response()->json([
            "message" => "User updated successfully",
            "id" => $user->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json([
                "message" => "User not found"
            ], 404);
        }
        $user->delete();
        return response()->json([
            "message" => "User deleted successfully"
        ]);
    }
}
