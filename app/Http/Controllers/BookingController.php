<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Метод для создания бронирования
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'room_id' => $validated['room_id'],
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
        ]);

        return redirect()->route('home');
    }

    // Метод для удаления бронирования
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('home');
    }
}
