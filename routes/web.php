<?php
use  App\Http\Controllers\FirrstController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Notification;
//use Illuminate\Support\Facades\Route;
use App\Notifications\RegisteredNotification;
use Illuminate\Support\Facades\Mail;
// Route::get('/test', function () {
//     return view('test');
// });
// Route::get('/test/{id}', function ($id) {
//     return "This is test page with id: $id";
// });
// Route::get('/test/{id}/{name}', function ($id,$name) {return view('test1', ['id' => $id, 'name' => $name]);});
// Route::get("/", function () { return view("tp1");})->name('productList.show');


// sans controller
// Route::get('/produit/{id}',function ($id){
//     $ProductList = [1 => "pantalon", 2 => "t-shirt", 3 => "Robe"];
//     return view('tp1detaile',['id' => $ProductList[$id]]);
// })->name('produit.show');
// avec controller
// Route::get('/produit/{id}','App\Http\Controllers\FirrstController@index')->name('produit.show');
// Route::get('/form','App\Http\Controllers\formvalidaton@store')->name('form');
// Route::get('/somme/{a}/{b}', 'App\Http\Controllers\CalculeConrtoller@somme')->middleware('test1');
// Route::get('/pro/{a}/{b}', 'App\Http\Controllers\CalculeConrtoller@pro');
// Route::get('/tasks', 'App\Http\Controllers\TaskController@index');
// Route::get('/livre/{id}', 'App\Http\Controllers\LivreController@show');

// Route::get('/layout', function () {
//     return view('layout');
// });
// Route::get('/accueil', function () {
//     return view('TPMiddlewares.accueil');
// })->middleware('age');
// Route::get('/contact', function () {
//     return view('TPMiddlewares.contact');
// })->middleware('user');
// Route::get('/test', function () {
//     return view('TPMiddlewares.test');
// })->middleware('test');
// Route::view('/page1','page1');
// Route::view('/page2','page2');
// Route::view('/ex2','exercice2');
// // Route::view('/form','formCSRF');
// Route::view('/ajouter','formajoutermodule')->name('ajouter');
// Route::post('/upload','App\Http\Controllers\ModuleController@upload')->name('upload');
// Route::view('/modifier/{module}','formmodifiermodule')->name('modifier');
// Route::delete('/supp/{module}','App\Http\Controllers\ModuleController@supp')->name('supp');
// Route::put('/mod/{module}','App\Http\Controllers\ModuleController@mod')->name('mod');
// Route::post('/ajou','App\Http\Controllers\ModuleController@ajou')->name('ajou');
// Route::post('/student','App\Http\Controllers\formvalidaton@getData')->name('student.store');
// Route::get('/module','App\Http\Controllers\ModuleController@getDataFromDB')->name('module.store');
Route::resource('modules','App\Http\Controllers\Modulecr');
Route::resource('groupes','App\Http\Controllers\Groupescr');
Route::resource('stagiaires','App\Http\Controllers\Stagiairescr');
Route::resource('transactions','App\Http\Controllers\Transactionscr');
Route::view('/','devweb');

Route::get('/test-email', function () {
    Mail::raw('Test email', function ($message) {
                    $message->to('dev204douha@gmail.com');
                    $message->subject('Test');
                });
            
                return 'Email sent!';
            });