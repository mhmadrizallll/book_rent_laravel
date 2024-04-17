<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookRentController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\UserController;
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

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authencating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerUser']);
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);

    Route::get('profile', [UserController::class, 'profile'])->middleware('only_client');

    Route::middleware('only_admin')->group(function () {

        Route::get('dashboard', [DashboardController::class, 'index']);
        Route::get('books', [BookController::class, 'index']);
        Route::get('book-add', [BookController::class, 'add']);
        Route::post('book-add', [BookController::class, 'store']);
        Route::get('book-edit/{slug}', [BookController::class, 'edit']);
        Route::put('book-edit/{slug}', [BookController::class, 'update']);
        Route::get('book-delete/{slug}', [BookController::class, 'delete']);
        Route::get('book-destroy/{slug}', [BookController::class, 'destroy']);
        Route::get('book-deleted', [BookController::class, 'deleted']);
        Route::get('book-restore/{slug}', [BookController::class, 'restore']);

        Route::get('categories', [CategoriesController::class, 'index']);
        Route::get('category-add', [CategoriesController::class, 'add']);
        Route::post('category-add', [CategoriesController::class, 'store']);
        Route::get('category-edit/{slug}', [CategoriesController::class, 'edit']);
        Route::put('category-edit/{slug}', [CategoriesController::class, 'update']);
        Route::get('category-delete/{slug}', [CategoriesController::class, 'delete']);
        Route::get('category-destroy/{slug}', [CategoriesController::class, 'destroy']);
        Route::get('category-deleted', [CategoriesController::class, 'deleted']);
        Route::get('category-restore/{slug}', [CategoriesController::class, 'restore']);

        Route::get('users', [UserController::class, 'index']);
        Route::get('user-registered', [UserController::class, 'registered']);
        Route::get('user-register/{slug}', [UserController::class, 'register']);
        Route::get('user-approve/{slug}', [UserController::class, 'approve']);
        Route::get('user-ban/{slug}', [UserController::class, 'ban']);
        Route::get('user-destroy/{slug}', [UserController::class, 'destroy']);
        Route::get('user-banned', [UserController::class, 'banned']);
        Route::get('user-restore/{slug}', [UserController::class, 'restore']);

        Route::get('book-rent', [BookRentController::class, 'index']);
        Route::post('book-rent', [BookRentController::class, 'store']);

        Route::get('rent-logs', [RentLogController::class, 'index']);
    });

});

Route::get('/', [PublisherController::class, 'index']);
