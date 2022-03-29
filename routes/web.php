<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(["middleware" => "web"], function(){

    Route::get('/', function () {
        return view('welcome');
    });
});


Route::group(["middleware" => "auth"], function(){

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get("/home", function(){ 
        return view("home");
    })->name("home");
    
    Route::get("/documents", function(){ 
        return view("documents");
    })->name("documents");

});



require __DIR__.'/auth.php';
