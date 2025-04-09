<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // Получаем все отели с их комнатами
        $hotels = Hotel::with('rooms')->get();
        return view('welcome', compact('hotels'));
    }

    public function index()
    {
        // Получаем все отели с их комнатами для страницы панели управления
        $hotels = Hotel::with('rooms')->get();
        return view('dashboard', compact('hotels'));
    }
}
