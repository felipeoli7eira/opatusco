<?php

use App\Http\Controllers\ClientesController;
use Illuminate\Support\Facades\Route;

Route::resource('clientes', ClientesController::class);
