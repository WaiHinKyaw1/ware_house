<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return response()->json($items);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cleanData = $request->validate([
            'name' => ['required','string',Rule::unique('items','name')],
            'unit' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $item = Item::create($cleanData);
        return response()->json([
            "message" => "Item created successfully",
            "id" => $item->id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::find($id);
        if (!$item) {
            return response()->json([
                "message" => "Item not found"
            ], 404);
        }

        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Item::find($id);
        if (!$item) {
            return response()->json([
                "message" => "Item not found"
            ], 404);
        }
        $cleanData = $request->validate([
            'name' => ['required','string',Rule::unique('items','name')],
            'unit' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
        $item->update($cleanData);

        return response()->json([
            "message" => "Item updated successfully",
            "id" => $item->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::find($id);
        if (!$item) {
            return response()->json([
                "message" => "Item not found"
            ], 404);
        }
        $item->delete();

        return response()->json([
            "message" => "Item deleted successfully",
        ]);
    }
}
