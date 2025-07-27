<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\WareHouse;
use App\Models\WareHouseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class WareHouseItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $ware_house_items = WareHouseItem::with('wareHouse', "item", 'ngo')->get();
        return response()->json($ware_house_items);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $cleanData = $request->validate([
            'ware_house_id' => ['required', 'integer', 'exists:ware_houses,id'],
            'ngo_id' => ['required', 'integer', 'exists:ngos,id'],
            'item_id' => ['required', Rule::exists('items', 'id')],
            'quantity' => ['required', 'numeric'],
        ]);
        $warehouse = WareHouse::findOrFail($cleanData['ware_house_id']);
        $item = Item::findOrFail($cleanData['item_id']);

        $kgPerUnit = $item->kg_per_unit;
        $totalKgToAdd = $cleanData['quantity'] * $kgPerUnit;


        if ($warehouse->capacity < $totalKgToAdd) {
            return response()->json([
                'message' => 'Not enough capacity in warehouse.'
            ], 400);
        }

        $existing = WarehouseItem::where('ware_house_id', $cleanData['ware_house_id'])
            ->where('item_id', $cleanData['item_id'])
            ->where('ngo_id', $cleanData['ngo_id'])
            ->first();

        if ($existing) {
            $existing->increment('quantity', $cleanData['quantity']);
        } else {
            WarehouseItem::create($cleanData);
        }
        $warehouse->capacity -= $totalKgToAdd;
        $warehouse->save();

        return response()->json([
            "message" => "Warehouse items created successfully."
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ngoId = $id;
        $ware_house_items = WarehouseItem::whereHas('warehouse', function ($q) use ($ngoId) {
            $q->where('ngo_id', $ngoId);
        })
            ->with('item', 'wareHouse')
            ->get();
        return response()->json($ware_house_items);
    }
    public function alerts()
    {
        $lowStockItems = WarehouseItem::with(['item', 'wareHouse'])
            ->where('quantity', '<', 10)
            ->get()
            ->map(function ($item) {
                return [
                    'item_name' => $item->item->name,
                    'warehouse_name' => $item->wareHouse->name,
                    'quantity' => $item->quantity,
                ];
            });

        $systemStatus = [
            'database' => DB::connection()->getPdo() ? 'ok' : 'down',
        ];

        return response()->json([
            'low_stock_items' => $lowStockItems,
            'system_status' => $systemStatus,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ware_house_item = WareHouseItem::find($id);
        if (!$ware_house_item) {
            return response()->json([
                'message' => "Ware House is not found"
            ]);
        }
        $cleanData = $request->validate([
            'ware_house_id' => ['required', 'integer', 'exists:ware_houses,id'],
            'ngo_id'         => ['required', 'integer', 'exists:ngos,id'],
            'item_id'        => ['required', Rule::exists('items', 'id')],
            'quantity'       => ['required', 'numeric'],
        ]);
        $warehouse = WareHouse::findOrFail($cleanData['ware_house_id']);
        $item = Item::findOrFail($cleanData['item_id']);


        $oldQuantity = $ware_house_item->quantity;
        $oldKg = $oldQuantity * $item->kg_per_unit;
        $newKg = $cleanData['quantity'] * $item->kg_per_unit;
        $differenceKg = $newKg - $oldKg;

        if ($differenceKg > 0 && $warehouse->capacity < $differenceKg) {
            return response()->json([
                'message' => 'Not enough capacity in warehouse to update quantity.'
            ], 400);
        }


        $warehouse->capacity -= $differenceKg;
        $warehouse->save();

        $ware_house_item->update($cleanData);

        return response()->json([
            "message" => "Warehouse items updated successfully."
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ware_house_item = WareHouseItem::find($id);
        if (!$ware_house_item) {
            return response()->json([
                "message" => "WareHouseItem id not Found",
            ]);
        }
        $warehouse = $ware_house_item->wareHouse;
        $item = $ware_house_item->item;
        $totalKg = $ware_house_item->quantity * $item->kg_per_unit;
        $warehouse->capacity += $totalKg;
        $warehouse->save();

        $ware_house_item->delete();
        return response()->json([
            "message" => "WareHouseItem successfully deleted"
        ]);
    }
}
