<?php

namespace App\Http\Controllers;

use App\Models\WareHouseItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WareHouseItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $ngoId = auth()->user()->ngo_id;
        $ware_house_items = WarehouseItem::whereHas('warehouse', function ($q) use ($ngoId) {
            $q->where('ngo_id', $ngoId);
        })
            ->with('item')
            ->get();
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
    'items' => ['required', 'array', 'min:1'],
    'items.*.item_id' => ['required', 'integer', 'exists:items,id'],
    'items.*.quantity' => ['required', 'integer', 'min:1'],
]);

$wareHouseId = $cleanData['ware_house_id'];
$ngoId = $cleanData['ngo_id'];

foreach ($cleanData['items'] as $item) {
    $existing = WarehouseItem::where('ware_house_id', $wareHouseId)
        ->where('item_id', $item['item_id'])
        ->where('ngo_id', $ngoId)
        ->first();

    if ($existing) {
        $existing->increment('quantity', $item['quantity']);
    } else {
        WarehouseItem::create([
            'ware_house_id' => $wareHouseId,
            'item_id' => $item['item_id'],
            'ngo_id' => $ngoId,
            'quantity' => $item['quantity'],
        ]);
    }
}

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
            ->with('item','wareHouse')
            ->get();
        return response()->json($ware_house_items);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $cleanData = $request->validate([
        'ware_house_id' => ['required', 'integer', 'exists:ware_houses,id'],
        'ngo_id' => ['required', 'integer', 'exists:ngos,id'],
        'items' => ['required', 'array', 'min:1'],
        'items.*.item_id' => ['required', 'integer', 'exists:items,id'],
        'items.*.quantity' => ['required', 'integer', 'min:1'],
    ]);

    $wareHouseId = $cleanData['ware_house_id'];
    $ngoId = $cleanData['ngo_id'];

    foreach ($cleanData['items'] as $item) {
        $existing = WarehouseItem::where('ware_house_id', $wareHouseId)
            ->where('item_id', $item['item_id'])
            ->where('ngo_id', $ngoId)
            ->first();

        if ($existing) {
            // quantity overwrite
            $existing->update([
                'quantity' => $item['quantity']
            ]);
        } else {
            WarehouseItem::create([
                'ware_house_id' => $wareHouseId,
                'item_id' => $item['item_id'],
                'ngo_id' => $ngoId,
                'quantity' => $item['quantity'],
            ]);
        }
    }

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
        if(!$ware_house_item) {
            return response()->json([
                "message" => "WareHouseItem id not Found",
            ]);
        }
        $ware_house_item->delete();
        return response()->json([
            "message" => "WareHouseItem successfully deleted"
        ]);
    }
}
