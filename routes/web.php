<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return view('default.home');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('cake', [AdminController::class, 'cake'])->name('cake');
        Route::post('create-category', [AdminController::class, 'createCategory'])->name('create-category');
        Route::post('add-cake', [AdminController::class, 'addCake'])->name('add-cake');
        Route::get('edit-stock', [AdminController::class, 'editStock'])->name('edit-stock');
        Route::post('add-stock', [AdminController::class, 'addStock'])->name('add-stock');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
