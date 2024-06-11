<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\usuarioController;
use App\Http\Controllers\api\plantaController;

Route::post("/registrar", [usuarioController::class,"registrar"]);
Route::post("/Login", [usuarioController::class,"Login"]);
Route::get("/planta", [plantaController::class,"index"]);


