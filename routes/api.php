<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("etudiant", 'App\Http\Controllers\Api\EtudiantController@listEtudiant'::class,"listEtudiant");
Route::get("etudiant/{id}", 'App\Http\Controllers\Api\EtudiantController@getEtudiant'::class,"getEtudiant");   
Route::post("creer", 'App\Http\Controllers\Api\EtudiantController@create'::class,"create");  
Route::put("update/{id}", 'App\Http\Controllers\Api\EtudiantController@update'::class,"update");  
Route::delete("delete/{id}", 'App\Http\Controllers\Api\EtudiantController@delete'::class,"delete");
// routes du livre
Route::get("livre", 'App\Http\Controllers\Api\LivreController@listLivre'::class,"listLivre");
Route::get("livre/{id}", 'App\Http\Controllers\Api\LivreController@getLivre'::class,"getLivre");   
Route::post("creer", 'App\Http\Controllers\Api\LivreController@create'::class,"create");  
Route::put("update/{id}", 'App\Http\Controllers\Api\LivreController@update'::class,"update");  
Route::delete("delete/{id}", 'App\Http\Controllers\Api\LivreController@delete'::class,"delete");  