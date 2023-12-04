<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlaceUpdateController;
use App\Http\Controllers\WishlistController;

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

Route::get('/home', function() {
    return Inertia::render('Home');
});

Route::get('/', function () {
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/ListPlaces', function() {
    return Inertia::render('ListPlaces');
});



Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';

/* Places Routes */
Route::get('/place/all', [PlaceController::class, 'send_places']);
Route::post('/place/add', [PlaceController::class, 'add_place']);
Route::post('/place/verif', [PlaceController::class, 'verif_place']);
Route::post('/place/update/{id}', [PlaceController::class, 'update_place']);
//Route::get('/place/{id}', [PlaceController::class, 'send_place'])->whereNumber('id');
Route::post('/place/delete', [PlaceController::class, 'delete_place']);

/* Wishlist Routes */
Route::get('/wishlist/{id}', [WishlistController::class, 'send_wishlists']);
Route::post('/wishlist/verif', [WishlistController::class, 'verif_wishlist']);
Route::post('/wishlist/add', [WishlistController::class, 'add_wishlist']);
Route::post('/wishlist/delete', [WishlistController::class, 'delete_wishlist']);

/* PlaceUpdate Routes */
Route::get('/placeUpdate/all', [PlaceUpdateController::class, 'send_placeUpdates']);
Route::post('/placeUpdate/add', [PlaceUpdateController::class, 'add_placeUpdate']);
Route::post('/placeUpdate/validate/{id}', [PlaceUpdateController::class, 'validate_placeUpdate']);
Route::post('/placeUpdate/delete/{id}', [PlaceUpdateController::class, 'delete_placeUpdate']);



Route::get('/place/10', function() {
    return Inertia::render('PlaceDetails');
});

Route::middleware('auth')->group(function () {
    Route::get('/wishlist', function() {
        return Inertia::render('WishList');
    });
    Route::get('/history', function() {
        return Inertia::render('History');
    });
    Route::get('/myaccount', function() {
        return Inertia::render('MyAccount');
    });
    Route::get('/admin', function() {
        return Inertia::render('AdminDashboard');
    });
    Route::get('/users', [UserController::class, 'send_users']);
    Route::post('/users/setRoleToAdmin/{id}', [UserController::class, 'setRoleToAdmin']);
    Route::post('/users/setRoleToUser/{id}', [UserController::class, 'setRoleToUser']);
});
