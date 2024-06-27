<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
use App\Livewire\CreateContact;
use App\Livewire\EditContact;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('counter', Counter::class);

Route::get('contact/create', CreateContact::class)
    ->name('create-contact');

Route::get('contact/edit/{contact}', EditContact::class)
    ->name('edit-contact');

require __DIR__.'/auth.php';
