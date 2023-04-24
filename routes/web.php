<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HiltonController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ImageUploadController;

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

// Route::get('/posts', 'App\Http\Controllers\PostsController@index')->name('posts.index');
Route::get('posts', [PostsController::class, 'index'])->name('posts.index');

Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
Route::get('/posts/edit/{id}', [PostsController::class, 'edit'])->name('posts.edit');
Route::post('/posts/update/{id}', [PostsController::class, 'update'])->name('posts.update');
Route::get('/posts/{id}', [PostsController::class, 'show'])->name('posts.show');

Route::get('/upload', [ImageUploadController::class, 'ImageUpload']);
Route::post('/upload/image/store', [ImageUploadController::class, 'ImageUploadStore'])->name('upload.image.store');


Route::get('/search', [SearchController::class, 'search'])->name('search');



// Users routes
Route::get('/users/display', [UsersController::class, 'index'])->name('users.display');
Route::get('/users/{id}', [UsersController::class, 'show'])->name('users.show');
Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
Route::post('/users/update/{id}', [UsersController::class, 'update'])->name('users.update');
// Route::post('/users/delete/{id}', [UsersController::class, 'destroy'])->name('users.display');

Route::delete('/users/delete', [UsersController::class, 'index'])->name('users.index');
Route::delete('/users/delete/{id}', [UsersController::class, 'destroy'])->name('users.delete');
// Route::get('delete', 'UsersController@index');
// Route::get('users/delete/{id}', 'UsersController@destroy');


// -------------------------------------------------------------------------

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });

    Route::group(['middleware' => ['auth']], function () {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});
