<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserGroupsController;
use App\Http\Controllers\UserPaymentsController;
use App\Http\Controllers\UserPurchasesController;
use App\Http\Controllers\UserReceiptsController;
use App\Http\Controllers\UserSalesController;
use App\Http\Controllers\UsersController;
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

Route::group(['middleware' => 'auth'], function () {

    Route::get('dashboard', function () {
        return view('welcome');
    });

    // Group
    Route::get('groups/', [UserGroupsController::class, 'index']);
    Route::get('groups/create/', [UserGroupsController::class, 'create']);
    Route::post('groups/', [UserGroupsController::class, 'store']);
    Route::delete('groups/{id}', [UserGroupsController::class, 'destroy']);


    // Users 7 routes backup
    Route::resource('users', UsersController::class);
    // // or
    // Route::get('users/', [UsersController:: class, 'index']);
    // Route::post('users/', [UsersController:: class, 'store']);
    // Route::get('users/create', [UsersController:: class, 'create']);
    // Route::get('users/{id}', [UsersController:: class, 'show']);
    // Route::put('users/{id}', [UsersController:: class, 'update']);
    // Route::delete('users/{id}', [UsersController:: class, 'destroy']);
    // Route::post('users/{id}/edit', [UsersController:: class, 'edit']);

    // Sales, Purchases, Payments, Receipts Combination user
    Route::get('users/{id}/sales', [UserSalesController::class, 'index'])->name('user.sales');
    Route::get('users/{id}/purchases', [UserPurchasesController::class, 'index'])->name('user.purchases');

    Route::get('users/{id}/payments', [UserPaymentsController::class, 'index'])->name('user.payments');
    Route::post('users/{id}/payments', [UserPaymentsController::class, 'store'])->name('users.payments.store');
    Route::delete('users/{id}/payments/{payment_id}', [UserPaymentsController::class, 'destroy'])->name('users.payments.destroy');


    Route::get('users/{id}/receipts', [UserReceiptsController::class, 'index'])->name('user.receipts');
    Route::post('users/{id}/receipts/', [UserReceiptsController::class, 'store'])->name('users.receipts.store');
    Route::delete('users/{id}/receipts/{receipt_id}', [UserReceiptsController::class, 'destroy'])->name('users.receipts.destroy');



    // Categories 
    Route::resource('categories', CategoriesController::class, ['except' => ['show']]);


    // Product
    Route::resource('products', ProductsController::class);

    // Authentic logout
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

// Authentic Login
Route::get('login/', [LoginController::class, 'login'])->name('login');
Route::post('login/', [LoginController::class, 'authenticate'])->name('login.confirm');
