<?php

use App\Http\Controllers\PetTiposController;
use Illuminate\Support\Facades\Route;

Route::resource('pettipos', PetTiposController::class);
