<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\BlogController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
Route::get('blogs', [BlogController::class, 'tableShow'])->name('blogs.table');

Route::get('blogs/create',[BlogController::class, 'create']);
Route::post('blogs',[BlogController::class, 'store']);
Route::get('blogs/{blog}/singleshow',[BlogController::class, 'show']);
Route::get('blogs/{blog}',[BlogController::class, 'edit']);
Route::put('blogs/{blog}',[BlogController::class, 'update']);
Route::delete('/blogs/{blog}',[BlogController::class, 'distroy']);

