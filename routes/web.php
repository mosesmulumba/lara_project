<?php

use App\Http\Controllers\ProfileController;
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

// Route::get('/', function(){
//     return view(view:'index');
// });

Route::get('/', [\App\Http\Controllers\HomeController::class , 'index'])
    ->name(name:'home');
Route::view('/about', view:'about')->name(name:'about');
Route::view('/contact', view:'contact')->name(name:'contact');

Route::get('posts/{postId}' , [\App\Http\Controllers\PostController::class , 'show'])
    ->name('posts.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
