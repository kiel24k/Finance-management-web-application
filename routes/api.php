<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');



route::controller(AuthController::class)->group(function () {
    route::post('signup', 'signup');
    route::post('login', 'login');
    route::get('/user', 'user');
});

route::controller(ClientController::class)->group(function () {
    route::post('/client-add-balance', 'addBalance');
    route::get('/current-balance', 'currentBalance');
});
