<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
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


Route::get('/register', [UsersController::class, 'store'])
    ->name('user.store');
Route::post('/register/create/{user}', [UsersController::class, 'create'])
->name('user.create');

Route::get('/login', [UsersController::class, 'store'])
    ->name('user.login');
Route::post('/login/create/{user}', [UsersController::class, 'create'])
    ->name('user.create');
