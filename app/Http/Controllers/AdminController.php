<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\HotelOwner;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Получаем всех пользователей и владельцев отелей
        $users = User::all();
        $hotel_owners = HotelOwner::all();
        return view('dashboard', compact('users', 'hotel_owners'));
    }

    // Удаление пользователя
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.index');
    }

    // Удаление владельца отеля
    public function destroyHotelOwner(HotelOwner $owner)
    {
        $owner->delete();
        return redirect()->route('admin.index');
    }
}
