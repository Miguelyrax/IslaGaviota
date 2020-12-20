<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogsController;
Use App\Http\Controllers\FfaunaController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/', HomeController::class )->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('blogs', [BlogsController::class, 'index'])->name('blogs.index');

Route::get('blogs/{blog}', [BlogsController::class, 'show'])->name('blogs.show');

Route::get('faunas', [FfaunaController::class, 'index'])->name('faunas.index');

Route::get('faunas/{specie}', [FfaunaController::class, 'show'])->name('faunas.show');

Route::get('storage-link', function(){
    Artisan::call('storage:link');
});
