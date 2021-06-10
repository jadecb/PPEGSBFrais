<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ComptableController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\VisiteurController;
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
//Route Welcome
Route::get('/',[DefaultController::class,'welcome'])
    ->middleware('auth')
    ->name('welcome');

//Route declaration Visiteur
Route::get('/declare',[VisiteurController::class,'declare'])
    ->middleware('auth')
    ->middleware('visiteur');;

Route::post('/declare',[VisiteurController::class,'doDeclare'])
    ->middleware('auth')
    ->middleware('visiteur');

//Route show declaration Visiteur
Route::get('/show',[VisiteurController::class,'showAll'])->middleware('auth');

Route::get('/show/{id}',[VisiteurController::class,'show'])->where(['id' => '[0-9]+'])
    ->middleware('auth')
    ->name('showdeclaration');

//Route pending declaration Visiteur
Route::get('/showpending',[ComptableController::class,'showpending'])->middleware('auth')
    ->middleware('comptable')
    ->name('showpending');

Route::get('/validate/{id}',[ComptableController::class,'valid'])->where(['id' => '[0-9]+'])
    ->middleware('auth')
    ->middleware('comptable')
    ->name('validatedeclaration');

Route::post('/validate/{id}',[ComptableController::class,'doValid'])->where(['id' => '[0-9]+'])
    ->middleware('auth')
    ->middleware('comptable');

Route::get('/showall',[ComptableController::class,'showall'])
    ->middleware('auth')
    ->middleware('comptable');

Route::get('/adduser',[AdminController::class,'register']);
Route::post('/adduser',[AdminController::class,'doRegister']);
Route::get('/users',[AdminController::class,'show']);

//Route Auth
Auth::routes();

