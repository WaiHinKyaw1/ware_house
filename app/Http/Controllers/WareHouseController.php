<?php

namespace App\Http\Controllers;

use App\Models\WareHouse;
use Illuminate\Http\Request;

class WareHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ware_houses = WareHouse::all();
        return response()->json($ware_houses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cleanData = $request->validate([
            "name" => ['required', 'string'],
            "address" => ['required', 'string'],
            "capacity" => ['required', 'integer']
        ]);
        $ware_house = WareHouse::create($cleanData);
        return response()->json([
            "message" => "Ware House created successfully",
            'id' => $ware_house->id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ware_house = WareHouse::find($id);
        if(!$ware_house) {
            return response()->json([
                'message' => "Ware House is not found"
            ]);

        }
        return response()->json($ware_house);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ware_house = WareHouse::find($id);
        if(!$ware_house){
            return response()->json([
                'message' => "Ware House is not found"
            ]);
        }
        $cleanData = $request->validate([
            "name" => ['required', 'string'],
            "address" => ['required', 'string'],
            "capacity" => ['required', 'integer']
        ]);
        $ware_house->update($cleanData);
        return response()->json([
            'message' => "Ware House updated successfully",
            'id' => $ware_house->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ware_house = WareHouse::find($id);
        if(!$ware_house){
            return response()->json([
                'message' => "Ware House is not found"
            ]);
        }
        $ware_house->delete();
        return response()->json([
            'message' => "Ware House deleted successfully"
        ]);
    }
}
