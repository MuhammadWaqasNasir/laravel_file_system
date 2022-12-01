<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/',[MainController::class,'welcome'])->name('welcome');
Route::post('save',[MainController::class,'save'])->name('save-fles');
Route::get('delete',[MainController::class,'delete'])->name('delete');
Route::get('download',[MainController::class,'download'])->name('download');
