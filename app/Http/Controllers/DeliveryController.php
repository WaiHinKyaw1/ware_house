<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Driver;
use App\Models\SupplyRequest;
use App\Models\Truck;
use App\Models\WareHouseItem;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveries = Delivery::with('supplyRequest','truck','delivery')->get();
        return response()->json($deliveries);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cleanData = $request->validate([
            'supply_request_id' => 'required|exists:supply_requests,id',
            'delivery_date' => 'required|date',
            'delivery_cost' => 'required|numeric',
            'truck_id' => 'required|exists:trucks,id',
            'driver_id' => 'required|exists:drivers,id',
            'items' => 'required|array|min:1',
            'items.*.item_id' => 'required|exists:items,id',
            'items.*.approved_quantity' => 'required|integer|min:1',
        ]);

        $supply_request = SupplyRequest::find($cleanData['supply_request_id']);
        Delivery::create([
            'supply_request_id' => $supply_request->id,
            'warehouse_id' => $supply_request->warehouse_id,
            'delivery_date' => $cleanData['delivery_date'],
            'delivery_cost' => $cleanData['delivery_cost'],
            'status' => 'approved',
        ]);
          // (2) Reduce stock from warehouse_items
          foreach ($cleanData['items'] as $item) {
            $stock = WareHouseItem::where('warehouse_id', $supply_request->warehouse_id)
                ->where('item_id', $item['item_id'])
                ->first();

            if (!$stock || $stock->quantity < $item['approved_quantity']) {
                throw new \Exception("Not enough stock for item ID {$item['item_id']}");
            }

            $stock->decrement('quantity', $item['approved_quantity']);
        }
        Truck::where('id', $cleanData['truck_id'])->update([
            'status' => 'inUse',
            'driver_id' => $cleanData['driver_id'],
        ]);
        Driver::where('id', $cleanData['driver_id'])->update([
            'status' => 'onLeave',
        ]);
          // (4) Mark request as approved
          $supply_request->update(['status' => 'approved']);
          return response()->json([
            'message' => "Delivery created successfully",
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $delivery = Delivery::find($id);
        if(!$delivery){
            return response()->json([
                "message" => "Delivery id not found"
            ]);
        }
        return response()->json($delivery);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delivery = Delivery::find($id);
        if(!$delivery){
            return response()->json([
                "message" => "Delivery id not found"
            ]);
        }
        $delivery->delete();
        return response()->json([
            "message" => "Delivery successfully deleted",
        ]);
    }
}
