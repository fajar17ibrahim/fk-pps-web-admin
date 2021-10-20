<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminGraduationController;
use App\Http\Controllers\AdminMutationController;
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
use App\Http\Controllers\AdminAuthLoginController;
use App\Http\Controllers\AdminUserController;

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


Route::get('/login', [AdminAuthLoginController::class, 'index'])->name('login');

Route::post('/login-request', [AdminAuthLoginController::class, 'login']);

Route::post('register-request', [AdminAuthLoginController::class, 'register']);

// Route::middleware(['jwt.verify', 'verified'])->group(function () {

    Route::get('/', [AdminDashboardController::class, 'index'])->name('home');

    Route::get('/graduation', [AdminGraduationController::class, 'index'])->name('graduation');

    Route::get('/graduation-add', [AdminGraduationController::class, 'graduationAdd'])->name('graduation-add');

    Route::get('/graduation-print-letter', [AdminGraduationController::class, 'graduationPrintLetter'])->name('graduation-print-letter');

    Route::get('/mutation', [AdminMutationController::class, 'index'])->name('mutation');

    Route::get('/mutation-add', [AdminMutationController::class, 'mutationAdd'])->name('mutation-add');

    Route::get('/mutation-print-letter', [AdminMutationController::class, 'mutationPrintLetter'])->name('mutation-print-letter');

    // Santri
    Route::get('master-santri/data/{level}/{school}/{kelas}', [AdminMasterSantriController::class, 'listData'])->name('master-santri.data');

    Route::get('master-santri-add/search/{village}', [AdminMasterSantriController::class, 'search'])->name('master-santri.search');
    
    Route::resource('master-santri', AdminMasterSantriController::class);

    Route::get('master-santri-add', [AdminMasterSantriController::class, 'addSantri'])->name('master-santri-add');

    Route::get('master-santri-edit', [AdminMasterSantriController::class, 'editSantri'])->name('master-santri-edit');

    Route::get('master-santri-details', [AdminMasterSantriController::class, 'detailsSantri'])->name('master-santri.details');

    // Ustadz
    Route::get('master-ustadz/data', [AdminMasterUstadzController::class, 'listData'])->name('master-ustadz.data');
        
    // Route::resource('master-mapel', AdminMasterMapelController::class);
    
    Route::resource('master-ustadz', AdminMasterUstadzController::class);

    Route::get('/master-ustadz-add', [AdminMasterUstadzController::class, 'addUstadz'])->name('master-ustadz-add');

    Route::get('/master-ustadz-edit', [AdminMasterUstadzController::class, 'editUstadz'])->name('master-ustadz-edit');

    // Kelas
    Route::get('master-class/data/{level}/{school}', [AdminMasterClassController::class, 'listData'])->name('master-class.data');
    
    Route::resource('master-class', AdminMasterClassController::class);

    // Mapel
    Route::get('master-mapel/data', [AdminMasterMapelController::class, 'listData'])->name('master-mapel.data');
        
    Route::resource('master-mapel', AdminMasterMapelController::class);

    // Tahun Pelajaran
    Route::get('master-school-year/data', [AdminMasterSchoolYearController::class, 'listData'])->name('master-school-year.data');
        
    Route::resource('master-school-year', AdminMasterSchoolYearController::class);

    // School
    Route::get('master-school/data/{school}', [AdminMasterSchoolController::class, 'listData'])->name('master-school.data');
    
    Route::resource('/master-school', AdminMasterSchoolController::class);

    Route::get('/master-school-add', [AdminMasterSchoolController::class, 'addSchool'])->name('master-school-add');

    Route::get('/master-school-edit', [AdminMasterSchoolController::class, 'editSchool'])->name('master-school-edit');

    // Semester
    Route::get('master-semester/data', [AdminMasterSemesterController::class, 'listData'])->name('master-semester.data');
    
    Route::resource('master-semester', AdminMasterSemesterController::class);

    Route::get('/master-relation-class', [AdminMasterRelationClassController::class, 'index'])->name('master-relation-class');

    Route::get('/master-relation-mapel', [AdminMasterRelationMapelController::class, 'index'])->name('master-relation-mapel');

    Route::get('/masterbook', [AdminMasterBookController::class, 'index'])->name('masterbook');

    Route::get('/masterbook-cover', [AdminMasterBookController::class, 'masterbookCover'])->name('masterbook-cover');

    Route::get('/masterbook-santri', [AdminMasterBookController::class, 'masterbookSantri'])->name('masterbook-santri');

    Route::get('/masterbook-report', [AdminMasterBookController::class, 'masterbookReport'])->name('masterbook-report');

    // Report Equipment
    Route::get('report-equipment/data', [AdminReportEquipmentController::class, 'listData'])->name('report-equipment.data');
    
    Route::resource('report-equipment', AdminReportEquipmentController::class);

    // Route::get('/report-equipment', [AdminReportEquipmentController::class, 'index'])->name('report-equipment');

    Route::get('/report-equipment-cover/{id}', [AdminReportEquipmentController::class, 'reportCover'])->name('report-equipment-cover');

    Route::get('/report-equipment-lembaga/{id}', [AdminReportEquipmentController::class, 'reportLembaga'])->name('report-equipment-lembaga');

    Route::get('/report-equipment-santri/{id}', [AdminReportEquipmentController::class, 'reportSantri'])->name('report-equipment-santri');

    Route::get('/report-equipment-mutation/{id}', [AdminReportEquipmentController::class, 'reportMutation'])->name('report-equipment-mutation');

    Route::get('/report-print', [AdminReportPrintController::class, 'index'])->name('report-print');

    Route::get('/report-uts-print-pdf', [AdminReportPrintController::class, 'utsExportPdf'])->name('report-uts-print-pdf');

    Route::get('/report-uas-print-pdf', [AdminReportPrintController::class, 'uasExportPdf'])->name('report-uas-print-pdf');

    Route::get('/report', [AdminReportValueController::class, 'index'])->name('report');

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

    // Route::get('/user', [AdminUserController::class, 'index'])->name('user');
    
    // User
    Route::get('user/data', [AdminUserController::class, 'listData'])->name('user.data');

    Route::get('user/search/{email}', [AdminUserController::class, 'search'])->name('user.search');
    
    Route::resource('user', AdminUserController::class);


// });



