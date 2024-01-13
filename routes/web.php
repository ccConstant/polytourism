<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlaceUpdateController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CommentController;

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

Route::get('/ListPlaces', function() {
    return Inertia::render('ListPlaces');
});



Route::get('/forgotPassword', function() {
    return Inertia::render('ForgotPassword');
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
Route::get('/place/{id}', [PlaceController::class, 'send_place'])->whereNumber('id');
Route::post('/place/delete/{id}', [PlaceController::class, 'delete_place']);
Route::get('/place/themes', [PlaceController::class, 'send_themes']);

/* Wishlist Routes */
Route::get('/wishlist/{id}', [WishlistController::class, 'send_wishlists']);
Route::post('/wishlist/verif', [WishlistController::class, 'verif_wishlist']);
Route::post('/wishlist/add', [WishlistController::class, 'add_wishlist']);
Route::post('/wishlist/delete/{id}', [WishlistController::class, 'delete_wishlist']);

/* PlaceUpdate Routes */
Route::get('/placeUpdate/all', [PlaceUpdateController::class, 'send_placeUpdates']);
Route::post('/placeUpdate/add', [PlaceUpdateController::class, 'add_placeUpdate']);
Route::post('/placeUpdate/validate/{id}', [PlaceUpdateController::class, 'validate_placeUpdate']);
Route::post('/placeUpdate/delete/{id}', [PlaceUpdateController::class, 'delete_placeUpdate']);

/* Comment Routes */
Route::get('/comment/all', [CommentController::class, 'send_comments']);
Route::get('/comment/rated/{id}', [CommentController::class, 'send_rated']);
Route::get('/comment/place/{id}', [CommentController::class, 'send_placeComments']);
Route::post('/comment/add', [CommentController::class, 'add_comment']);
Route::post('/comment/verif', [CommentController::class, 'verif_comment']);
Route::post('/comment/delete/{id}', [CommentController::class, 'delete_comment']);
Route::get('/comment/average/{id}', [CommentController::class, 'average_rating']);


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
    Route::get('/newPlace', function() {
    return Inertia::render('NewPlace');
    });
    Route::get('/comparePlace/{id}', function() {
        return Inertia::render('ComparePlaces');
    });
    Route::get('/placeView/{id}', function() {
        return Inertia::render('PlaceDetails');
    });
    Route::get('/users', [UserController::class, 'send_users']);
    Route::post('/users/setRoleToAdmin/{id}', [UserController::class, 'setRoleToAdmin']);
    Route::post('/users/setRoleToUser/{id}', [UserController::class, 'setRoleToUser']);
    Route::post('/users/delete/{id}', [UserController::class, 'delete']);
});


Route::fallback(function() {
    return Inertia::render('Home');
});