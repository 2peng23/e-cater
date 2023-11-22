<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
// Route::get('/', function () {
//     if (Auth::check()) {
//         return redirect('/dashboard');
//     }
//     $cakes = App\Models\Cake::take(8)->get();
//     return view('default.home');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::middleware('auth')->group(function () {
    // admin
    Route::middleware('auth')->group(function () {
        Route::get('cake', [AdminController::class, 'cake'])->name('cake');
        Route::post('create-category', [AdminController::class, 'createCategory'])->name('create-category');
        Route::post('add-cake', [AdminController::class, 'addCake'])->name('add-cake');
        Route::get('edit-stock', [AdminController::class, 'editStock'])->name('edit-stock');
        Route::post('add-stock', [AdminController::class, 'addStock'])->name('add-stock');
        Route::get('cake-info', [AdminController::class, 'cakeInfo'])->name('cake-info');
        Route::post('update-cake', [AdminController::class, 'updateCake'])->name('update-cake');
    });
    // user
    Route::middleware('auth')->group(function () {
        Route::post('add-cart', [UserController::class, 'addCart'])->name('add-cart');
        Route::get('cart-items', [UserController::class, 'cartItems'])->name('cart-items');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
