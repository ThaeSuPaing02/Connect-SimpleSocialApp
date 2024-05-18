<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\FeedController;
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

Route::get('', [DashboardController::class, 'index'])->name('dashboard.dashboard');
Route::group(['prefix'=>'ideas/','as'=>'idea.','middleware'=>['auth']],function(){
    Route::post('', [IdeaController::class, 'store'])->name('store')->withoutMiddleware(['auth']);
    Route::delete('/{id}',[IdeaController::class,'destroy'])->name('destroy');
    Route::get('{idea}',[IdeaController::class,'show'])->name('show')->withoutMiddleware(['auth']);
    Route::get('{idea}/edit',[IdeaController::class,'edit'])->name('edit');
    Route::put('{idea}/update',[IdeaController::class,'update'])->name('update');
    Route::post('{idea}/comment', [CommentController::class, 'store'])->name('comment.store')->middleware('auth');
});



Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'store']);
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'authenticate']);
Route::post('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/terms', function () {
    return view('terms');
})->name('');
Route::get('/profile',[UserController::class,'profile'])->middleware(['auth'])->name('profile');
Route::resource('users',UserController::class)->only('edit','update')->middleware('auth');
Route::resource('users',UserController::class)->only('show');
Route::post('users/{user}/follow',[FollowerController::class,'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow',[FollowerController::class,'unfollow'])->middleware('auth')->name('users.unfollow');

Route::post('ideas/{idea}/like',[IdeaLikeController::class,'like'])->middleware('auth')->name('ideas.like');
Route::post('ideas/{idea}/unlike',[IdeaLikeController::class,'unlike'])->middleware('auth')->name('ideas.unlike');

//feed is for only those who are logged in
Route::get('/feed',FeedController::class)->middleware('auth')->name('feed');

Route::get('/admin',[AdminDashboardController::class,'index'])->name('admin.dashboard')->middleware(['auth','can:admin']);
