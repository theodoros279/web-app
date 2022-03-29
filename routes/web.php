<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AccountController; 
use App\Http\Controllers\NotificationController; 

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
    return view('home');  
}); 

Route::get('/home', function () {
    return view('home');
})->name('home');  
 
Route::middleware(['auth'])->group(function() {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');    
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware(['isAdmin']);  
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');  
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show'); 
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware(['isAdmin']);;
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');    
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy'); 
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store'); 
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy'); 
    Route::get('/account', [AccountController::class, 'index'])->name('account.index'); 
    Route::get('/send-notification',[NotificationController::class, 'index'])->name('notify.users'); 
});  

Route::get('/dashboard', function () {
    return redirect('home'); 
})->middleware(['auth'])->name('dashboard'); 

require __DIR__.'/auth.php';
