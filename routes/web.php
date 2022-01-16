<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Models\Region;

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

Route::get("/tipy-na-vylet", function () {
    $regions = Region::all();

    return view('tipyNaVylet', [
        'regions' => $regions
    ]);
})->name("tipyNaVyletPage");

Route::view("/o-nas","oNas")->name("oNasPage");
Route::view("/profil","profil")->name("profilPage");

Route::get("/clanky/novy-clanok", [ArticleController::class, 'getToCreate'])->name('novyClanokPage');
Route::post("/clanky/vytvorit", [ArticleController::class, 'vytvorit']);
Route::get("/clanky/{region}", [ArticleController::class, 'getByRegion']);

Route::get('delete',[UserController::class,'delete']);
Route::get('edit',[UserController::class,'edit']);
Route::post('update',[UserController::class,'update'])->name('update');


require __DIR__.'/auth.php';


