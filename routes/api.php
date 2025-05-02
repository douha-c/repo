<?php

use App\Http\Controllers\api\TodoListController;
use App\Http\Controllers\api\Appcarscontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResources([
    "todos"=> TodoListController::class,
    "cars"=> Appcarscontroller::class
]);