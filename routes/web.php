<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.dashboard');
Route::post('/ideas', [IdeaController::class, 'store'])->name('idea.store');
Route::delete('/ideas/{id}',[IdeaController::class,'destroy'])->name('idea.destroy');
Route::get('/ideas/{idea}',[IdeaController::class,'show'])->name('idea.show');
Route::get('/ideas/{idea}/edit',[IdeaController::class,'edit'])->name('idea.edit');
Route::put('/ideas/{idea}/update',[IdeaController::class,'update'])->name('idea.update');

Route::post('/ideas/{idea}/comment', [CommentController::class, 'store'])->name('idea.comment.store');
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'store']);
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'authenticate']);
Route::post('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/terms', function () {
    return view('terms');
});

