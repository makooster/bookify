<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function create(Hotel $hotel)
    {
        return view('rooms.create', compact('hotel'));
    }

    public function store(Request $request, Hotel $hotel)
    {
        $data = $request->validate([
            'room_number' => 'required',
            'price' => 'required|numeric',
        ]);

        $hotel->rooms()->create($data);
        return redirect()->route('hotels.index');
    }

}
