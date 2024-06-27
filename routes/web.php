<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AccountPurchaseMovieController;
use App\Http\Controllers\AccountRentalMovieController;
use App\Http\Controllers\AccountSubscriptionController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsertypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('login');

// Route::get('/back', function () {
//     return view('back/index', ['title' => "Accueil"]);
// });

Route::get('back', [DashController::class, 'index'])->name('dashboard');
Route::post('back', [DashController::class, 'login'])->name('dashboard');

/**
 * Les routes pour les Operations
 */
Route::resource('operations', OperationController::class)->names([
    'index' => 'operations.index',
    'create' => 'operations.create',
    'store' => 'operations.store',
    'edit' => 'operations.edit',
    'destroy' => 'operations.destroy',
    'update' => 'operations.update',
    'show' => 'operations.show'
]);

/**
 * Les routes pour les Subscriptions
 */
Route::resource('subscriptions', SubscriptionController::class)->names([
    'index' => 'subscriptions.index',
    'create' => 'subscriptions.create',
    'store' => 'subscriptions.store',
    'edit' => 'subscriptions.edit',
    'destroy' => 'subscriptions.destroy',
    'update' => 'subscriptions.update',
    'show' => 'subscriptions.show'
]);

/**
 * Les routes pour les Status
 */
Route::resource('status', StatusController::class)->names([
    'index' => 'status.index',
    'create' => 'status.create',
    'store' => 'status.store',
    'edit' => 'status.edit',
    'destroy' => 'status.destroy',
    'update' => 'status.update',
    'show' => 'status.show'
]);

/**
 * Les routes pour les movies
 */
Route::resource('movies', MovieController::class)->names([
    'index' => 'movies.index',
    'create' => 'movies.create',
    'store' => 'movies.store',
    'edit' => 'movies.edit',
    'destroy' => 'movies.destroy',
    'update' => 'movies.update',
    'show' => 'movies.show'
]);
Route::get('movies/{movie}/upload', [MovieController::class, 'upload'])->name('movies.upload');
Route::put('movies/{movie}/upload', [MovieController::class, 'upload'])->name('movies.upload');

/**
 * Les routes pour les Usertypes
 */
Route::resource('usertypes', UsertypeController::class)->names([
    'index' => 'usertypes.index',
    'create' => 'usertypes.create',
    'store' => 'usertypes.store',
    'edit' => 'usertypes.edit',
    'destroy' => 'usertypes.destroy',
    'update' => 'usertypes.update',
    'show' => 'usertypes.show'
]);

/**
 * Les routes pour les Users
 */
Route::resource('users', UserController::class)->names([
    'index' => 'users.index',
    'create' => 'users.create',
    'store' => 'users.store',
    'edit' => 'users.edit',
    'destroy' => 'users.destroy',
    'update' => 'users.update',
    'show' => 'users.show'
]);

/**
 * Les routes pour les Accounts
 */
Route::resource('accounts', AccountController::class)->names([
    'index' => 'accounts.index',
    'create' => 'accounts.create',
    'store' => 'accounts.store',
    'edit' => 'accounts.edit',
    'destroy' => 'accounts.destroy',
    'update' => 'accounts.update',
    'show' => 'accounts.show'
]);

/**
 * Les routes pour les Accounts Purchase Movies
 */
Route::resource('purchasemovies', AccountPurchaseMovieController::class)->names([
    'index' => 'purchasemovies.index',
    'create' => 'purchasemovies.create',
    'store' => 'purchasemovies.store',
    'edit' => 'purchasemovies.edit',
    'destroy' => 'purchasemovies.destroy',
    'update' => 'purchasemovies.update',
    'show' => 'purchasemovies.show'
]);

/**
 * Les routes pour les Accounts Rental Movies
 */
Route::resource('rentalmovies', AccountRentalMovieController::class)->names([
    'index' => 'rentalmovies.index',
    'store' => 'rentalmovies.store',
    'edit' => 'rentalmovies.edit',
    'destroy' => 'rentalmovies.destroy',
    'update' => 'rentalmovies.update',
    'show' => 'rentalmovies.show'
]);
Route::get('rentalmovies.create/{account}', [AccountRentalMovieController::class, 'create'])->name('rentalmovies.create');

/**
 * Les routes pour les Accounts Subscriptions
 */
Route::resource('accountsubscriptions', AccountSubscriptionController::class)->names([
    'index' => 'accountsubscriptions.index',
    'create' => 'accountsubscriptions.create',
    'store' => 'accountsubscriptions.store',
    'edit' => 'accountsubscriptions.edit',
    'destroy' => 'accountsubscriptions.destroy',
    'update' => 'accountsubscriptions.update',
    'show' => 'accountsubscriptions.show'
]);
