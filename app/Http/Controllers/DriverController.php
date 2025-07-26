<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::all();
        return response()->json($drivers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cleanData = $request->validate([
            "name" => ['required', 'string'],
            "phone" => ['required', 'string'],
            "license_no" => ['required', 'string'],
        ]);
        $cleanData['status'] = "active";
        $driver = Driver::create($cleanData);
        return response()->json([
            "message" => "Driver created successfully",
            "id" => $driver->id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $driver = Driver::find($id);
        if (!$driver) {
            return response()->json([
                'message' => "Driver is not found"
            ]);
        }
        return response()->json($driver);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $driver = Driver::find($id);
        if (!$driver) {
            return response()->json([
                'message' => "Driver is not found"
            ]);
        }
        $cleanData = $request->validate([
            "name" => ['required', 'string'],
            "phone" => ['required', 'string'],
            "license_no" => ['required', 'string'],
            "status" => ['required']
        ]);
        $driver->update($cleanData);
        return response()->json([
            "message" => "Driver updated successfully",
            'id' => $driver->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $driver = Driver::find($id);
        if (!$driver) {
            return response()->json([
                "message" => "Driver is not found"
            ]);
        }
        $driver->delete();
        return response()->json([
            "message" => "Driver deleted successfully"
        ]);
    }
}
