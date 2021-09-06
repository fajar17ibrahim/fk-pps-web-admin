<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminGraduationController;
use App\Http\Controllers\AdminMasterBookController;
use App\Http\Controllers\AdminReportEquipmentController;
use App\Http\Controllers\AdminReportValueController;
use App\Http\Controllers\AdminReportPrintController;
use App\Http\Controllers\AdminUserProfileController;
use App\Http\Controllers\AdminCurriculumController;
use App\Http\Controllers\AdminMasterSantriController;
use App\Http\Controllers\AdminMasterUstadzController;
use App\Http\Controllers\AdminMasterClassController;
use App\Http\Controllers\AdminMasterMapelController;
use App\Http\Controllers\AdminMasterSchoolController;
use App\Http\Controllers\AdminMasterSchoolYearController;
use App\Http\Controllers\AdminMasterSemesterController;
use App\Http\Controllers\AdminMasterRelationClassController;
use App\Http\Controllers\AdminMasterRelationMapelController;
use App\Http\Controllers\AdminSchoolProfileController;

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

Route::get('/graduation-add', [AdminGraduationController::class, 'graduationAdd'])->name('graduation-add');

Route::get('/master-santri', [AdminMasterSantriController::class, 'index'])->name('master-santri');

Route::get('/master-ustadz', [AdminMasterUstadzController::class, 'index'])->name('master-ustadz');

Route::get('/master-class', [AdminMasterClassController::class, 'index'])->name('master-class');

Route::get('/master-mapel', [AdminMasterMapelController::class, 'index'])->name('master-mapel');

Route::get('/master-school', [AdminMasterSchoolController::class, 'index'])->name('master-school');

Route::get('/master-school-year', [AdminMasterSchoolYearController::class, 'index'])->name('master-school-year');

Route::get('/master-semester', [AdminMasterSemesterController::class, 'index'])->name('master-semester');

Route::get('/master-relation-class', [AdminMasterRelationClassController::class, 'index'])->name('master-relation-class');

Route::get('/master-relation-mapel', [AdminMasterRelationMapelController::class, 'index'])->name('master-relation-mapel');

Route::get('/masterbook', [AdminMasterBookController::class, 'index'])->name('masterbook');

Route::get('/report-equipment', [AdminReportEquipmentController::class, 'index'])->name('report-equipment');

Route::get('/report', [AdminReportValueController::class, 'index'])->name('report');

Route::get('/report-print', [AdminReportPrintController::class, 'index'])->name('report-print');

Route::get('/report-value', [AdminReportValueController::class, 'reportValue'])->name('report-value');

Route::get('/report-value-settings', [AdminReportValueController::class, 'reportValueSettings'])->name('report-value-settings');

Route::get('/report-attitude', [AdminReportValueController::class, 'reportAttitude'])->name('report-attitude');

Route::get('/report-attendance', [AdminReportValueController::class, 'reportAttendance'])->name('report-attendance');

Route::get('/report-achievement', [AdminReportValueController::class, 'reportAchievement'])->name('report-achievement');

Route::get('/report-homeroomnotes', [AdminReportValueController::class, 'reportHomeRoomNotes'])->name('report-homeroomnotes');

Route::get('/report-extrakurikuler', [AdminReportValueController::class, 'reportExtrakurikuler'])->name('report-extrakurikuler');

Route::get('/user-profile', [AdminUserProfileController::class, 'index'])->name('user-profile');

Route::get('/school-profile', [AdminSchoolProfileController::class, 'index'])->name('school-profile');

Route::get('/curriculum', [AdminCurriculumController::class, 'index'])->name('curriculum');

