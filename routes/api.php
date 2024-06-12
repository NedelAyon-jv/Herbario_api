<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Router;
use App\Http\Controllers\api\usuarioController;
use App\Http\Controllers\api\plantaController;
use App\Http\Controllers\api\observacionesController;
use App\Http\Controllers\api\aprobacionesController; 


Route::post("/registrar", [usuarioController::class,"registrar"]);
Route::post("/Login", [usuarioController::class,"Login"]);
Route::get("/planta", [plantaController::class,"index"]);
Route::post("/planta", [plantaController::class,"store"]);
Route::get("/Observacion", [observacionesController::class,"index"]);
Route::post("/Observacion", [observacionesController::class,"store"]);
Route::patch("/Observacion/{id}", [observacionesController::class,"update"]);
Route::delete("/Observacion/{id}", [observacionesController::class,"destroy"]);
Route::get("/Aprobaciones", [aprobacionesController::class,"index"]);
Route::post("/Aprobaciones", [aprobacionesController::class,"store"]);
Route::patch("/Aprobaciones/{id}", [aprobacioesController::class,"update"]);
Route::delete("Aprobaciones/{id}", [aprobacioesController::class,"destroy"]);




