<?php

namespace App\Http\Controllers;

use App\Models\WareHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WareHouseController extends Controller
{
  
    protected $conversionFactor = [
        'liter' => 0.85,
        'kg' => 1,
        'piece' => 0.5,
    ];
  public function capacityStatus($id)
    {
        $warehouse = WareHouse::find($id);
        if (!$warehouse) {
            return response()->json(['message' => 'Warehouse not found'], 404);
        }

        // warehouse_items join with items to get quantity and unit
        $warehouseItems = DB::table('ware_house_items')
            ->join('items', 'ware_house_items.item_id', '=', 'items.id')
            ->where('ware_house_items.ware_house_id', $id)
            ->select('ware_house_items.quantity', 'items.unit')
            ->get();

        $usedKg = 0;
        foreach ($warehouseItems as $wi) {
            $factor = $this->conversionFactor[$wi->unit] ?? 1;
            $usedKg += $wi->quantity * $factor;
        }

        $remaining = $warehouse->capacity - $usedKg;

        return response()->json([
            'warehouse_id' => $warehouse->id,
            'warehouse_name' => $warehouse->name,
            'total_capacity_kg' => $warehouse->capacity,
            'used_capacity_kg' => round($usedKg, 2),
            'remaining_capacity_kg' => round($remaining, 2),
        ]);
    }

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
         if ($ware_house->wareHouseItems()->exists()) {
            return response()->json([
                'message' => 'Cannot Delete: WareHouse is in use by  WareHouseItem.',
                'id' => $ware_house->id,
            ], 422);
        }
        $ware_house->delete();
        return response()->json([
            'message' => "Ware House deleted successfully"
        ]);
    }
}
