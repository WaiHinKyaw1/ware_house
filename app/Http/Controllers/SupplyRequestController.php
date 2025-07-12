<?php

namespace App\Http\Controllers;

use App\Models\RouteInfo;
use App\Models\SupplyRequest;
use Illuminate\Http\Request;

class SupplyRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supply_requests = SupplyRequest::with('ngo','supplyRequestItems','routeInfos')->get();
        return response()->json($supply_requests);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cleanData = $request->validate([
            'ngo_id' => 'required|exists:ngos,id',
            'request_date' => 'required|date',
            'items' => 'required|array|min:1',
            'items.*.item_id' => ['required|exists:items,id'],
            'items.*.quantity' => 'required|integer|min:1',

            'start' => 'required|string',
            'end' => 'required|string',
            'distance_km' => 'required|numeric',
            'duration_minutes' => 'required|integer',
            'charge' => 'required|numeric',
            'polyline' => 'nullable|string',
        ]);
        $supply_request = SupplyRequest::create([
            'ngo_id' => $cleanData['ngo_id'],
            'request_date' => $cleanData['request_date'],
            'status' => 'pending',
        ]);
        foreach($cleanData['items'] as $item){
            $supply_request->supplyRequestItems()->create([
                'item_id' => $item['item_id'],
                'quantity' => $item['quantity'],
            ]);
        }
            RouteInfo::create([
            'start' => $cleanData['start'],
            'end' => $cleanData['end'],
            'distance_km' => $cleanData['distance_km'],
            'duration_minutes' => $cleanData['duration_minutes'],
            'charge' => $cleanData['charge'],
            'polyline' => $cleanData['polyline'] ?? null,
            'supply_request_id' => $supply_request->id,
        ]);
        return response()->json([   
            'message' => "Supply Request created successfully",
            'id' => $supply_request->id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
