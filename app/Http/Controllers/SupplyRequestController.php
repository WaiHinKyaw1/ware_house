<?php

namespace App\Http\Controllers;

use App\Models\RouteInfo;
use App\Models\SupplyRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'ngo_id' => ['required',Rule::exists('ngos','id')],
            'items' => 'required|array|min:1',
            'items.*.item_id' => ['required', Rule::exists('items', 'id')],
            'items.*.quantity' => 'required|integer|min:1',

            'start' => 'required|string',
            'end' => 'required|string',
            'distance_km' => 'required|numeric',
            'distance_miles' => 'required',
            'duration_minutes' => 'required|integer',
            'charge' => 'required|numeric',
            'polyline' => 'nullable|string',
        ]);
        $cleanData['request_date'] =date('Y-m-d');
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
            'distance_miles' => $cleanData['distance_miles'],
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
        $supply_request = SupplyRequest::find($id);
        if(!$supply_request){
            return response()->json([
                "message" => " Supply Request id not Found"
            ]);
        }
        return response()->json($supply_request);
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
        
    }
}
