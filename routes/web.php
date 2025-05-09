<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\RoleManagement\IndexRm;
use App\Livewire\UserManagement\IndexUm;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');

    // Role Management
    Route::get('role-management', IndexRm::class)->name('rm.index');
    // User Management
    Route::get('user-management', IndexUm::class)->name('um.index');
});

require __DIR__.'/auth.php';
