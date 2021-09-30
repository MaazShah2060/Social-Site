<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['auth']], function () {
Route::get('/home', [PostController::class, 'post'])->name('home');
Route::match(['get', 'post'], '/profile/{id}', [UserController::class, 'profile']);
Route::get('/add-post/{id}', [PostController::class, 'create_post']);
Route::match(['get', 'post'], '/delete-post/{id}', [PostController::class, 'delete_post']);
Route::get('/add-comment/{id}', [CommentController::class, 'add_comment']);
Route::get('/delete-comment/{id}', [CommentController::class, 'delete_comment']);
Route::post('/update-user', [UserController::class, 'update_user']);
Route::match(['get', 'post'], '/manage-users', [UserController::class, 'manage_users']);
Route::match(['get', 'post'], '/delete-user/{id}', [UserController::class, 'delete_user']);
Route::get('/make-admin/{id}', [UserController::class, 'make_admin']);
});