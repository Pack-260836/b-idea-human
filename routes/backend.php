<?php

use App\Http\Controllers\AuthController;
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


Route::prefix('backend/v1/auth')->group(function () {
    Route::post('/check/login', [AuthController::class, 'checkLogin']);
    Route::post('/check/logout', [AuthController::class, 'checkLogout']);
});
// Route::get('/', function () {
//     return view('welcome');
// });
