<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\StagiaireController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;

// folder Crud2
// Route::get("/module/list",[ModuleController::class,"index"])->name("list");
// Route::get("/module/create", [ModuleController::class,"create"])->name("create");
// Route::get("/module/edit/{id}", [ModuleController::class, "edit"])->name("edit");
// Route::post("/module/add", [ModuleController::class,"store"])->name("add");
// Route::delete("/module/delete/{id}", [ModuleController::class,"destroy"])->name("delete");
// Route::put("/module/update/{id}", [ModuleController::class,'update'])->name('update');

// Folder Crud3
Route::resource('modules', ModuleController::class);
Route::resource('groupes', GroupController::class);
Route::resource('stagiaires', StagiaireController::class);
Route::resource('notes', NoteController::class);

Route::get('/',function(){
    return view('CRUD3.home');
})->name('home');