<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Room;
use Illuminate\Http\Request;

use App\Http\Requests\PropertyRequest;
use App\Http\Requests\PropertyUpdateRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::with('rooms')->get(); 
        return response()->json($properties, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyRequest $request)
    {
        $validated = $request->validated();

        $property = Property::create($validated);
        
        return response()->json($property, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show($propertyId)
    {
        $property = Property::find($propertyId);

        if (!$property) {
            return response()->json(['message' => 'Room not found'], 404);
        }

        return response()->json($property, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyUpdateRequest $request, Property $property)
    {

        $validated = $request->validated();

        $property->update($validated);

        return response()->json($property, 200);
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        
        $deletedPropertyId = $property->id;

        Room::where('property_id', $deletedPropertyId)->delete();

        $property->delete();
        return response()->json(['message' => 'Property with rooms successfully deleted', 'property_id' => $deletedPropertyId], 200);

    }
}
