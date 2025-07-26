<?php

namespace App\Http\Controllers;

use App\Models\Ngo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NgoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ngos = Ngo::all();
        return response()->json($ngos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cleanData = $request->validate([
            "name" => "required|string",
            "contact_person" => "required|string",
            "phone" => "required|string",
            "email" => ["required","email",Rule::unique('ngos','email')],
            "address" => "required|string",
        ]);

        $ngo = Ngo::create($cleanData);

        return response()->json([
            "message" => "NGO created successfully",
            "id" => $ngo->id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ngo = Ngo::find($id);
        if (!$ngo) {
            return response()->json([
                "message" => "NGO not found"
            ], 404);
        }
        return response()->json($ngo);  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ngo = Ngo::find($id);
        if (!$ngo) {
            return response()->json([
                "message" => "NGO not found"
            ], 404);
        }
        $cleanData = $request->validate([
            "name" => ["required","string"],
            "contact_person" => ["required","string"],
            "phone" => ["required","string"],
            "email" => ["required","email",Rule::unique('ngos','email')->ignore($id)],
            "address" => ["required","string"],
        ]);
        $ngo->update($cleanData);
        return response()->json([
            "message" => "NGO updated successfully",
            "id" => $ngo->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ngo = Ngo::find($id);
        if (!$ngo) {
            return response()->json([
                "message" => "NGO not found"
            ], 404);
        }
        $ngo->delete();
        return response()->json([
            "message" => "NGO deleted successfully",
        ]);
    }
}
