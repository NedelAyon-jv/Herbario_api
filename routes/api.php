<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Router;
use App\Http\Controllers\api\usuarioController;
use App\Http\Controllers\api\plantaController;
use App\Http\Controllers\api\observacionesController;
use App\Http\Controllers\api\aprobacionesController; 


Route::post("/registrar", [usuarioController::class,"registrar"]);
Route::post("/login", [usuarioController::class,"Login"]);
Route::get("/user", [usuarioController::class,"getUserData"])->middleware("auth:sanctum");
Route::get("/planta", [plantaController::class,"index"]);
Route::post("/planta", [plantaController::class,"store"]);
Route::post("/observacion", [observacionesController::class,"store"])->middleware("auth:sanctum");
Route::get("/observacion", [observacionesController::class,"index"]);
Route::get("/observacion/{id}", [ObservacionesController::class,"show"]);
Route::patch("/observacion/{id}", [observacionesController::class,"update"]);
Route::delete("/observacion/{id}", [observacionesController::class,"destroy"]);
Route::get("/aprobaciones", [aprobacionesController::class,"index"]);
Route::post("/aprobaciones", [aprobacionesController::class,"store"]);
Route::patch("/aprobaciones/{id}", [aprobacioesController::class,"update"]);
Route::delete("/aprobaciones/{id}", [aprobacioesController::class,"destroy"]);




