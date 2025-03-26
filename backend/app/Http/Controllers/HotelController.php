<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        return response()->json(Hotel::with('rooms')->get());
    }

    public function store(Request $request)
    {
        $hotel = Hotel::create($request->all());
        return response()->json($hotel, 201);
    }

    public function show($id)
    {
        $hotel = Hotel::with('rooms')->findOrFail($id);
        return response()->json($hotel);
    }

    public function update(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->update($request->all());
        return response()->json($hotel);
    }

    public function destroy($id)
    {
        Hotel::destroy($id);
        return response()->json(null, 204);
    }
}
