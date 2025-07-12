<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trucks = Truck::with('driver')->get();
        return response()->json($trucks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cleanData = $request->validate([
            "plate_no" => ['required', 'string'],
            "model" => ['required', 'string'],
            "capacity" => ['required', 'integer'],
            "status" => ['required', 'string'],
            "driver_id" => ['required', Rule::exists('drivers', 'id')],
        ]);
        $truck = Truck::create($cleanData);
        return response()->json([
            "message" => "Truck created successfully",
            "id" => $truck->id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $truck = Truck::find($id);
        if(!$truck) {
            return response()->json([
                'message' => "Truck is not found"
            ]);
        }
        return response()->json($truck);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $truck = Truck::find($id);
        if(!$truck) {
            return response()->json([
                'message' => "Truck is not found"
            ]);
        }
        $cleanData = $request->validate([
            "plate_no" => ['required', 'string'],
            "model" => ['required', 'string'],
            "capacity" => ['required', 'integer'],
            "status" => ['required', 'string'],
            "driver_id" => ['required', Rule::exists('drivers', 'id')],
        ]);
        $truck->update($cleanData);
        return response()->json([
            'message' => "Truck updated successfully",
            'id' => $truck->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $truck = Truck::find($id);
        if(!$truck) {
            return response()->json([
                'message' => "Truck is not found"
            ]);
        }
        $truck->delete();
        return response()->json([
            'message' => "Truck deleted successfully"
        ]);
    }
}
