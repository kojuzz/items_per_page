<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

// Route::get('/opportunities', \App\Livewire\Opportunities::class);
Route::get('/', function() {
    return view('items.list');
});
