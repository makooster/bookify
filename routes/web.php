<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Главная страница (welcome)
Route::get('/', [HomeController::class, 'home'])->name('home');

// Главная страница после входа
Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// Аутентифицированные пользователи
Route::middleware(['auth'])->group(function () {

    // Профиль
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Бронирования
    Route::resource('bookings', BookingController::class)->only(['store', 'destroy']);
});

// Владельцы отелей
Route::middleware(['auth', 'role:hotel_owner'])->group(function () {
    Route::resource('hotels', HotelController::class)->except(['show']);
    Route::get('hotels/{hotel}', [HotelController::class, 'show'])
        ->middleware('auth')
        ->name('hotels.show');
});

// Администратор
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('users.delete');
    Route::delete('/hotel-owners/{owner}', [AdminController::class, 'destroyHotelOwner'])->name('hotel_owners.delete');
});




require __DIR__.'/auth.php';
