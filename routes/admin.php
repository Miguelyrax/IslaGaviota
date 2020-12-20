<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;


Route::get('', [HomeController::class, 'index'])->middleware('can:Ver dashboard')->name('home');

Route::resource('roles', RoleController::class)->names('roles');

Route::resource('users', UserController::class)->only(['index','edit','update'])->names('users');

Route::get('/blog', [AdminController::class, 'blog'])->middleware('can:Leer usuarios')->name('blog');

Route::get('/blog/userblog', [AdminController::class, 'userblog'])->middleware('can:Leer blogs')->name('userblog');

Route::get('home/admin', [AdminController::class, 'index'])->middleware('can:Ver dashboard')->name('index');

Route::get('/feature', [AdminController::class, 'feature'])->middleware('can:Leer species')->name('feature');

Route::get('/habitat', [AdminController::class, 'habitat'])->middleware('can:Leer species')->name('habitat');

Route::get('/tipo', [AdminController::class, 'tipo'])->middleware('can:Leer species')->name('tipo');

Route::get('/category', [AdminController::class, 'category'])->middleware('can:Leer usuarios')->name('category');

Route::get('/specie', [AdminController::class, 'specie'])->middleware('can:Leer usuarios')->name('specie');