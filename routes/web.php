<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminGraduationController;
use App\Http\Controllers\AdminMasterBookController;
use App\Http\Controllers\AdminReportEquipmentController;
use App\Http\Controllers\AdminReportValueController;
use App\Http\Controllers\AdminUserProfileController;

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

Route::get('/', [AdminDashboardController::class, 'index'])->name('home');

Route::get('/graduation', [AdminGraduationController::class, 'index'])->name('graduation');

Route::get('/masterbook', [AdminMasterBookController::class, 'index'])->name('masterbook');

Route::get('/report-equipment', [AdminReportEquipmentController::class, 'index'])->name('report-equipment');

Route::get('/report-value', [AdminReportValueController::class, 'index'])->name('report-value');

Route::get('/user-profile', [AdminUserProfileController::class, 'index'])->name('user-profile');
