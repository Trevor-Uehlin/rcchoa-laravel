<?php

use Illuminate\Support\Facades\Route;
use App\Models\Document;
use App\Models\User;

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


    Route::get("documents/filtered", "App\Http\Controllers\DocumentsController@showFiltered");

    Route::get('/download/{id}', function($id) {

        $doc = Document::find($id);

        return Storage::download($doc->filepath, $doc->name);
    });

    Route::get("/document/delete/{id}", "App\Http\Controllers\DocumentsController@destroy");
    

    Route::resource("/documents", "App\Http\Controllers\DocumentsController")->names(["index" => "documents"]);


    Route::get("/register/user", function(){

        return view("create_user");
    })->name("registeruser");

    Route::post("/save/user", function(){

        $user = User::create([
            'name' => $_POST["name"],
            'email' => $_POST["email"],
            'user_type' => $_POST["user_type"],
            'password' => Hash::make($_POST["password"]),
        ]);

        return redirect(route("dashboard"));
    });
    
});



require __DIR__.'/auth.php';
