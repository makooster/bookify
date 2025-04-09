<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    // Метод для отображения всех отелей
    public function index()
    {
        $hotels = Hotel::all();
        return view('hotels.index', compact('hotels'));
    }

    // Метод для отображения формы добавления нового отеля
    public function create()
    {
        return view('hotels.create');
    }

    // Метод для сохранения нового отеля
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|max:1024',
        ]);

        $hotel = Hotel::create($validated);

        if ($request->hasFile('image')) {
            $hotel->image = $request->file('image')->store('hotels');
            $hotel->save();
        }

        return redirect()->route('hotels.index');
    }

    // Метод для отображения данных отеля
    public function show(Hotel $hotel)
    {
        return view('hotels.show', compact('hotel'));
    }

    // Метод для редактирования отеля
    public function edit(Hotel $hotel)
    {
        return view('hotels.edit', compact('hotel'));
    }

    // Метод для обновления отеля
    public function update(Request $request, Hotel $hotel)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|max:1024',
        ]);

        $hotel->update($validated);

        if ($request->hasFile('image')) {
            $hotel->image = $request->file('image')->store('hotels');
            $hotel->save();
        }

        return redirect()->route('hotels.index');
    }

    // Метод для удаления отеля
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect()->route('hotels.index');
    }
}
