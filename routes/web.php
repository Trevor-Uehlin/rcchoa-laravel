<?php

use Illuminate\Support\Facades\Route;
use App\Models\Document;

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

    Route::get("/register/user", function(){

        return view("auth.register");
    });
});


Route::group(["middleware" => "auth"], function(){

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get("documents/filtered", "App\Http\Controllers\DocumentsController@showFiltered");

    Route::get('/download/{id}', function($id) {

        $doc = Document::find($id);

        return Storage::download($doc->filepath, $doc->name);
    });

    Route::get("/document/delete/{id}", "App\Http\Controllers\DocumentsController@destroy");
    

    Route::resource("/documents", "App\Http\Controllers\DocumentsController")->names(["index" => "documents"]);
    
});



require __DIR__.'/auth.php';
