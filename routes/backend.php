<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MasterControllers\AllowanceController;
use App\Http\Controllers\MasterControllers\OvertimeController;
use App\Http\Controllers\MasterControllers\PositionController;
use App\Http\Controllers\MasterControllers\TimeWorkController;
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
Route::prefix('backend/v1/masters')->group(function () {
    Route::post('/timework/update', [TimeWorkController::class, 'update']);
    Route::post('/position/update', [PositionController::class, 'update']);
    Route::get('/position/fetch/{id}', [PositionController::class, 'fetchById']);
    Route::post('/overtime/update', [OvertimeController::class, 'update']);
    Route::get('/overtime/fetch/{id}', [OvertimeController::class, 'fetchById']);
    Route::post('/allowance/update', [AllowanceController::class, 'update']);
    Route::get('/allowance/fetch/{id}', [AllowanceController::class, 'fetchById']);
});
Route::prefix('backend/v1')->group(function () {
    Route::post('/employee/create', [EmployeeController::class, 'create']);
    Route::post('/employee/update', [EmployeeController::class, 'update']);
});
// Route::get('/', function () {
//     return view('welcome');
// });
