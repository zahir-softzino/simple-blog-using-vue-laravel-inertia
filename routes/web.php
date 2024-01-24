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
Route::get('blogs', [BlogController::class, 'tableShow']);

Route::get('blogs/create',[BlogController::class, 'create']);
Route::post('blogs',[BlogController::class, 'store']);