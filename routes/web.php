<?php
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\UsersController;

Route::get('/', [UsersController::class, 'index']);