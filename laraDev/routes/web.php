<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/viewRegistration',[adminController::class,'viewRegistration']);
Route::post('/registerControl',[adminController::class,'registerControl']);
Route::get('/login',[adminController::class,'login']);
Route::post('/loginCheck',[adminController::class,'loginCheck']);
Route::get('/addCategory',[adminController::class,'addCategory']);
Route::post('/insertCategory',[adminController::class,'insertCategory']);

Route::get('/showCat',[adminController::class,'showCat']);

Route::get('/delete/{deleteID}',[adminController::class,'delete'  ]);

Route::get('catAndSub',[adminController::class,'catAndSub']);

Route::get('catAndPro',[adminController::class,'catAndPro']);

Route::get('subAndPro',[adminController::class,'subAndPro']);

Route::get('search',[adminController::class,'search']);

Route::get('test',[adminController::class,'test']);