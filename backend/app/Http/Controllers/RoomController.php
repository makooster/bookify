<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function store(Request $request, $hotel_id)
    {
        $hotel = Hotel::findOrFail($hotel_id);
        $room = $hotel->rooms()->create($request->all());
        return response()->json($room, 201);
    }

    public function destroy($id)
    {
        Room::destroy($id);
        return response()->json(null, 204);
    }

}
