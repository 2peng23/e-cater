<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\User;
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
        // Billing
        Route::get('billing-information', [AdminController::class, 'billingInfo'])->name('billing-information');
        Route::post('add-billing', [AdminController::class, 'addBilling'])->name('add-billing');
        Route::get('client-rentals', [AdminController::class, 'clientRental'])->name('client-rentals');
        Route::get('approve-rent/{id}', [AdminController::class, 'approveRent'])->name('approve-rent');
        Route::get('decline-rent/{id}', [AdminController::class, 'declineRent'])->name('decline-rent');
        // cake
        Route::get('cake', [AdminController::class, 'cake'])->name('cake');
        Route::post('create-category', [AdminController::class, 'createCategory'])->name('create-category');
        Route::post('add-cake', [AdminController::class, 'addCake'])->name('add-cake');
        Route::get('edit-stock', [AdminController::class, 'editStock'])->name('edit-stock');
        Route::post('add-stock', [AdminController::class, 'addStock'])->name('add-stock');
        Route::get('cake-info', [AdminController::class, 'cakeInfo'])->name('cake-info');
        Route::post('update-cake', [AdminController::class, 'updateCake'])->name('update-cake');
        Route::get('delete-cake', [AdminController::class, 'deleteCake'])->name('delete-cake');
        // catering
        Route::get('catering', [AdminController::class, 'catering'])->name('catering');
        Route::post('add-package', [AdminController::class, 'addPackage'])->name('add-package');
        Route::get('edit-cater', [AdminController::class, 'editCater'])->name('edit-cater');
        Route::post('update-package', [AdminController::class, 'updatePackage'])->name('update-package');
        Route::get('delete-cater', [AdminController::class, 'deleteCater'])->name('delete-cater');
        Route::get('delete-inclusion', [AdminController::class, 'deleteInclusion'])->name('delete-inclusion');
        Route::get('edit-cater-stock', [AdminController::class, 'editCaterStock'])->name('edit-cater-stock');
        Route::post('add-cater-stock', [AdminController::class, 'addCaterStock'])->name('add-cater-stock');
    });
    // user
    Route::middleware('auth')->group(function () {
        // cake
        Route::post('add-cart', [UserController::class, 'addCart'])->name('add-cart');
        Route::get('my-cake-orders', [UserController::class, 'cartItems'])->name('my-cake-orders');
        Route::get('add-quantity', [UserController::class, 'addQuantity'])->name('add-quantity');
        Route::get('remove-cart', [UserController::class, 'removeCart'])->name('remove-cart');

        // cater

        Route::post('add-cater-cart', [UserController::class, 'addCaterCart'])->name('add-cater-cart');
        Route::get('my-rentals', [UserController::class, 'myRentals'])->name('my-rentals');
        Route::get('remove-cater-cart', [UserController::class, 'removeCaterCart'])->name('remove-cater-cart');

        // rent and order
        Route::post('agree-term', [UserController::class, 'agreeTerm'])->name('agree-term');
        Route::get('rent-package/{id}', [UserController::class, 'rentPackage'])->name('rent-package');
        Route::get('get-image', [UserController::class, 'getImage'])->name('get-image');
        Route::post('rental-order', [UserController::class, 'rentOrder'])->name('rental-order');
        Route::get('order-cake/{id}', [UserController::class, 'orderCake'])->name('order-cake');
        Route::post('avail-cake', [UserController::class, 'availCake'])->name('avail-cake');

        // my orders and rental
        Route::get('my-orders&rentals', [UserController::class, 'myOrdersRentals'])->name('my-orders&rentals');
    });
});


// For all
Route::get('cater-information', [UserController::class, 'caterInfo'])->name('cater-information');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
