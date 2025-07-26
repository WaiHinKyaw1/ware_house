<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\DeliveryItem;
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
        $deliveries = Delivery::with('supplyRequest.ngo', 'truck.driver')->get();
        return response()->json($deliveries);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cleanData = $request->validate([
            'supply_request_id' => 'required|exists:supply_requests,id',
            'delivery_cost' => 'required|numeric',
            'truck_id' => 'required|exists:trucks,id',
        ]);

        $cleanData['delivery_date'] = date('Y-m-d');
        $supply_request = SupplyRequest::with(['supplyRequestItems'])->find($cleanData['supply_request_id']);
        $delivery = Delivery::create([
            'supply_request_id' => $supply_request->id,
            'delivery_date' => $cleanData['delivery_date'],
            'delivery_cost' => $cleanData['delivery_cost'],
            'truck_id' => $cleanData['truck_id'],
            'status' => 'in Transit',
        ]);
        // (2) Reduce stock from warehouse_items
        foreach ($supply_request->supplyRequestItems as $requestItem) {
            $itemId = $requestItem->item_id;
            $quantity = $requestItem->quantity;

            $stock = WareHouseItem::where('ware_house_id', $requestItem->ware_house_id)
                ->where('item_id', $itemId)
                ->first();

            if (!$stock || $stock->quantity < $quantity) {
                throw new \Exception("Not enough stock for item ID {$itemId}");
            }

            $stock->decrement('quantity', $quantity);
            DeliveryItem::create([
                'delivery_id' => $delivery->id,
                'item_id' => $itemId,
                'quantity' => $quantity,
            ]);
        }

        Truck::where('id', $cleanData['truck_id'])->update([
            'status' => 'inUse',
        ]);

        // Driver status ကို update လုပ်မယ် (truck table ထဲက driver_id ကိုသုံးမယ်)
        $truck = Truck::find($cleanData['truck_id']);
        if ($truck && $truck->driver_id) {
            Driver::where('id', $truck->driver_id)->update([
                'status' => 'onLeave',
            ]);
        }
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
        if (!$delivery) {
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
        $delivery = Delivery::find($id);
        if (!$delivery) {
            return response()->json([
                "message" => "Delivery id not found"
            ]);
        }
        $cleanData = $request->validate([
            'status' => "required"
        ]);

        $delivery->update($cleanData);
        return response()->json([
            "message" => "Delivery updated successfully"
        ]);
    }


    public function destroy(string $id)
    {
        $delivery = Delivery::find($id);
        if (!$delivery) {
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
