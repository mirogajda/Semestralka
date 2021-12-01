<?php

use App\Http\Controllers\UserController;
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


Route::view("/","domov")->name("homePage");
Route::view("/tipy-na-vylet","tipyNaVylet")->name("tipyNaVyletPage");
Route::view("/o-nas","oNas")->name("oNasPage");
Route::view("/profil","profil")->name("profilPage");
Route::get('delete/{id}',[UserController::class,'delete']);


require __DIR__.'/auth.php';

