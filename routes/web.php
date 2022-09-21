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
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ContactController;

Route::get('/', [EventController::class, 'index']);
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');
Route::post('/events',[EventController::class,'store']);
Route::get('/events/{id}',[EventController::class,'show']);
Route::get('/dashboard',[EventController::class,'dashboard'])->middleware('auth');
Route::delete('/events/{id}',[EventController::class,'destroy']);
