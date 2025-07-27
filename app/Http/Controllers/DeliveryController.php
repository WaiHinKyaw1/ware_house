<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\DeliveryItem;
use App\Models\Driver;
use App\Models\SupplyRequest;
use App\Models\Truck;
use App\Models\WareHouseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        DB::beginTransaction();
        try {
            $cleanData['delivery_date'] = date('Y-m-d');

            // Load supply request with related items and their weights
            $supply_request = SupplyRequest::with(['supplyRequestItems.item'])->find($cleanData['supply_request_id']);

            // Calculate total weight
            $totalWeight = 0;
            foreach ($supply_request->supplyRequestItems as $requestItem) {
                $totalWeight += $requestItem->quantity * $requestItem->item->kg_per_unit;
            }

            // Check truck capacity before creating delivery
            $truck = Truck::findOrFail($cleanData['truck_id']);
            if ($totalWeight > $truck->capacity) {
                return response()->json([
                    'message' => "Truck overload: max capacity is {$truck->capacity}kg, trying to load {$totalWeight}kg",
                ], 422);
            }

            // Create the delivery record
            $delivery = Delivery::create([
                'supply_request_id' => $supply_request->id,
                'delivery_date' => $cleanData['delivery_date'],
                'delivery_cost' => $cleanData['delivery_cost'],
                'truck_id' => $cleanData['truck_id'],
                'status' => 'in Transit',
            ]);

            // Process each supply request item
            foreach ($supply_request->supplyRequestItems as $requestItem) {
                $itemId = $requestItem->item_id;
                $quantity = $requestItem->quantity;

                $stock = WareHouseItem::where('ware_house_id', $requestItem->ware_house_id)
                    ->where('item_id', $itemId)
                    ->first();

                if (!$stock || $stock->quantity < $quantity) {
                    throw new \Exception("Not enough stock for item ID {$itemId}");
                }

                // Deduct stock
                $stock->decrement('quantity', $quantity);

                // Increase warehouse available capacity (free space)
                $item = $requestItem->item;
                $warehouse = $requestItem->wareHouse;
                $totalKg = $quantity * $item->kg_per_unit;
                $warehouse->capacity += $totalKg;
                $warehouse->save();

                // Create delivery item
                DeliveryItem::create([
                    'delivery_id' => $delivery->id,
                    'item_id' => $itemId,
                    'quantity' => $quantity,
                ]);
            }

            // Update truck status
            $truck->update(['status' => 'inUse']);

            // Update driver status if exists
            if ($truck->driver_id) {
                Driver::where('id', $truck->driver_id)->update([
                    'status' => 'onLeave',
                ]);
            }

            // Mark supply request as approved
            $supply_request->update(['status' => 'approved']);

            DB::commit();
            return response()->json([
                'message' => "Delivery created successfully",
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => "Delivery failed: " . $e->getMessage(),
            ], 500);
        }
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
