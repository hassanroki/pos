<?php

use App\Http\Controllers\UserGroupsController;
use App\Http\Controllers\UsersController;
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
    return view('welcome');
});

Route::get('groups/', [UserGroupsController:: class, 'index']);
Route::get('groups/create/', [UserGroupsController:: class, 'create']);
Route::post('groups/', [UserGroupsController:: class, 'store']);
Route::delete('groups/{id}', [UserGroupsController:: class, 'destroy']);

Route::get('users/', [UsersController:: class, 'users']);