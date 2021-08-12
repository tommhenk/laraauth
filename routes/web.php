<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\MyAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\AdminUpdatePostController;
use App\Http\Controllers\Auth\MyAuthController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::middleware(['web'])->group( function () {
//     Route::get('/login', [MyAuthController::class, 'create'])->name('login');
//     Route::post('/login', [MyAuthController::class, 'store']);
//     Route::post('/logout', [MyAuthController::class, 'destroy'])->name('logout');
// } );

Route::get('/main', [MyAuthController::class, 'first'])->middleware(['web','auth'])->name('main');

Route::middleware(['auth'])->prefix('admin')->group( function () {
    Route::get('/', [AdminController::class, 'show'])->name('admin_index');


    Route::get('/add/post', [AdminPostController::class, 'show'])->name('admin_add_post');
    Route::post('/add/post', [AdminPostController::class, 'create'])->name('admin_add_post_p');

    Route::get('/update/post/{id}', [AdminUpdatePostController::class, 'show'])->name('admin_update_post');
    Route::post('/update/post', [AdminUpdatePostController::class, 'create'])->name('admin_update_post_p');

    Route::get('/contact', [ContactController::class, 'show'])->name('admin_contact_show');
    Route::post( '/contact', [ContactController::class, 'storage'])->name('admin_contact');
} );
















