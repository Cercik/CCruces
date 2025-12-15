<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/politicas-seguridad', function () {
    return view('politicas-seguridad');
});

Route::get('/politicas/bocado', function () {
    return view('politicas-bocado');
});
