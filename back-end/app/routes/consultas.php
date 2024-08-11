<?php

use App\Http\Controllers\ConsultasController;
use Illuminate\Support\Facades\Route;

Route::resource('consultas', ConsultasController::class);
