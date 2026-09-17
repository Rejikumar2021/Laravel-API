<?php

// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

use Inertia\Inertia;

Route::get('/', fn() => Inertia::render('Home'));
