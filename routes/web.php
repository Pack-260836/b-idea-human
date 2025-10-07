<?php

use App\Http\Controllers\NavigatorPagesContollers\AdminPageController;
use App\Http\Controllers\NavigatorPagesContollers\ChiefPageController;
use App\Http\Controllers\NavigatorPagesContollers\UserPageController;
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

Route::get('/', function () {
    return view('/pages/login');
});
Route::middleware('auth:admin')->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/dashboard', [AdminPageController::class, 'dashboard']);
        Route::get('/leave-form', [AdminPageController::class, 'leave_form']);
        Route::get('/ot-form', [AdminPageController::class, 'ot_form']);
        Route::get('/job-form', [AdminPageController::class, 'job_form']);
        Route::get('/employee', [AdminPageController::class, 'employee']);
        Route::get('/employee/add', [AdminPageController::class, 'employee_add']);
        Route::post('/employee/edit', [AdminPageController::class, 'employee_edit']);
        Route::get('/upsalary', [AdminPageController::class, 'upsalary']);
        Route::get('/payroll', [AdminPageController::class, 'payroll']);
        Route::get('/payroll/process', [AdminPageController::class, 'payroll_process']);
        Route::get('/payroll/report', [AdminPageController::class, 'payroll_report']);
        Route::get('/master', [AdminPageController::class, 'master']);
        Route::get('/master/company', [AdminPageController::class, 'master_company']);
        Route::get('/master/timework', [AdminPageController::class, 'master_time_work']);
        Route::get('/master/position', [AdminPageController::class, 'master_position']);
        Route::get('/master/allowance', [AdminPageController::class, 'master_allowance']);
        Route::get('/master/overtime', [AdminPageController::class, 'master_overtime']);

        Route::group(['prefix' => 'reports'], function () {
            Route::get('/timesheet/person', [AdminPageController::class, 'report_timesheet_person']);
            Route::get('/leave', [AdminPageController::class, 'report_leave']);
        });
    });
});

Route::middleware('auth:chief')->group(function () {
    Route::group(['prefix' => 'chief'], function () {
        Route::get('/dashboard', [ChiefPageController::class, 'dashboard']);
        Route::get('/leave', [ChiefPageController::class, 'leave']);
    });
});
Route::middleware('auth:user')->group(function () {
    Route::get('/dashboard', [UserPageController::class, 'dashboard']);
});
