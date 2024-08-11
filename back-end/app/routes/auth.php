<?php

use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::post('auth', [UsuariosController::class, 'auth']);

// Route::middleware('auth:sanctum')->group(function() {
// });
