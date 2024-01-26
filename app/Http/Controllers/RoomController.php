<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

use App\Http\Requests\RoomRequest;
use App\Http\Requests\RoomUpdateRequest;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(RoomRequest $request)
    {
        $validated = $request->validated();

        $property = Room::create($validated);

        return response()->json($property, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($roomId)
    {
        $room = Room::find($roomId);

        if (!$room) {
            return response()->json(['message' => 'Room not found'], 404);
        }

        return response()->json($room, 200);
    }

    public function showByPropertyID($propertyId)
    {
        $room = Room::where('property_id', $propertyId)->get();

        if (!$room) {
            return response()->json(['message' => 'rooms not found'], 404);
        }

        return response()->json($room, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomUpdateRequest $request, Room $room)
    {
        $validated = $request->validated();

        $room->update($validated);

        return response()->json($room, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        
        $deletedRoomId = $room->id;

        $room->delete();
        return response()->json(['message' => 'Room record successfully deleted', 'room_id' => $deletedRoomId], 200);
    }
}
