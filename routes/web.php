<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminGraduationController;
use App\Http\Controllers\AdminMutationController;
use App\Http\Controllers\AdminMasterBookController;
use App\Http\Controllers\AdminReportEquipmentController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\AdminReportValueController;
use App\Http\Controllers\AdminReportAttendanceController;
use App\Http\Controllers\AdminReportAttitudeController;
use App\Http\Controllers\AdminReportExtrakurikulerController;
use App\Http\Controllers\AdminReportAchievementController;
use App\Http\Controllers\AdminReportHomeRoomTeacherNotesController;
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

Route::post('login-request', [AdminAuthLoginController::class, 'login']);

Route::post('register-request', [AdminAuthLoginController::class, 'register']);

Route::get('logout', [AdminAuthLoginController::class, 'logout'])->name('logout');

Route::middleware(['verify', 'verified'])->group(function () {

    Route::get('/', [AdminDashboardController::class, 'index'])->name('home');

    // Graduation
    Route::resource('graduation', AdminGraduationController::class);

    Route::get('graduation/data/{level}/{school}', [AdminGraduationController::class, 'listData'])->name('graduation.data');
    
    Route::get('graduation-add', [AdminGraduationController::class, 'graduationAdd'])->name('graduation-add');
        
    Route::get('graduation-print-letter/{id}', [AdminGraduationController::class, 'graduationPrintLetter'])->name('graduation-print-letter');
       
    // Mutation
    Route::resource('mutation', AdminMutationController::class);

    Route::get('mutation/data/{level}/{school}', [AdminMutationController::class, 'listData'])->name('mutation.data');
    
    Route::get('mutation-add', [AdminMutationController::class, 'mutationAdd'])->name('mutation-add');
        
    Route::get('mutation-print-letter', [AdminMutationController::class, 'mutationPrintLetter'])->name('mutation-print-letter');
        
    // Santri
    Route::get('master-santri/data/{level}/{school}/{kelas}', [AdminMasterSantriController::class, 'listData'])->name('master-santri.data');

    Route::get('master-santri-add/search/{village}', [AdminMasterSantriController::class, 'search'])->name('master-santri.search');
    
    Route::resource('master-santri', AdminMasterSantriController::class);

    Route::get('master-santri-add', [AdminMasterSantriController::class, 'addSantri'])->name('master-santri-add');

    Route::get('master-santri-edit', [AdminMasterSantriController::class, 'editSantri'])->name('master-santri-edit');

    Route::get('master-santri-details', [AdminMasterSantriController::class, 'detailsSantri'])->name('master-santri.details');

    // Ustadz
    Route::get('master-ustadz/data/{school}', [AdminMasterUstadzController::class, 'listData'])->name('master-ustadz.data');
        
    Route::resource('master-ustadz', AdminMasterUstadzController::class);

    Route::get('master-ustadz-add', [AdminMasterUstadzController::class, 'addUstadz'])->name('master-ustadz-add');

    Route::get('master-ustadz-add/search/{village}', [AdminMasterUstadzController::class, 'search'])->name('master-ustadz.search');
    
    Route::get('master-ustadz-edit/{id}', [AdminMasterUstadzController::class, 'editUstadz'])->name('master-ustadz-edit');

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

    Route::get('master-school-add/search/{village}', [AdminMasterSchoolController::class, 'search'])->name('master-santri.search');
    
    Route::get('master-school-add/search-kepsek/{nik}', [AdminMasterSchoolController::class, 'searchKepsek'])->name('master-school.search-kepsek');
    
    Route::get('master-school-edit/{id}', [AdminMasterSchoolController::class, 'editSchool'])->name('master-school-edit');

    // Semester
    Route::get('master-semester/data', [AdminMasterSemesterController::class, 'listData'])->name('master-semester.data');
    
    Route::resource('master-semester', AdminMasterSemesterController::class);

    // Relation Class
    Route::get('master-relation-class/data/{level}/{school}', [AdminMasterRelationClassController::class, 'listData'])->name('master-relation-class.data');
    
    Route::resource('master-relation-class', AdminMasterRelationClassController::class);

    // Relation Guru Mapel
    Route::get('master-relation-mapel/data/{level}/{school}/{kelas}', [AdminMasterRelationMapelController::class, 'listData'])->name('master-relation-mapel.data');
    
    Route::resource('master-relation-mapel', AdminMasterRelationMapelController::class);

    // Report Print
    Route::get('masterbook/data/{level}/{school}/{kelas}', [AdminMasterBookController::class, 'listData'])->name('masterbook.data');

    Route::resource('masterbook', AdminMasterBookController::class);

    Route::get('masterbook-cover/{id}', [AdminMasterBookController::class, 'masterbookCover'])->name('masterbook-cover');

    Route::get('masterbook-santri/{id}', [AdminMasterBookController::class, 'masterbookSantri'])->name('masterbook-santri');

    Route::get('masterbook-report/{id}', [AdminMasterBookController::class, 'masterbookReport'])->name('masterbook-report');

    // Report Equipment
    Route::get('report-equipment/data/{level}/{school}/{kelas}', [AdminReportEquipmentController::class, 'listData'])->name('report-equipment.data');
    
    Route::resource('report-equipment', AdminReportEquipmentController::class);

    Route::get('/report-equipment-cover/{id}', [AdminReportEquipmentController::class, 'reportCover'])->name('report-equipment-cover');

    Route::get('/report-equipment-lembaga/{id}', [AdminReportEquipmentController::class, 'reportLembaga'])->name('report-equipment-lembaga');

    Route::get('/report-equipment-santri/{id}', [AdminReportEquipmentController::class, 'reportSantri'])->name('report-equipment-santri');

    Route::get('/report-equipment-mutation/{id}', [AdminReportEquipmentController::class, 'reportMutation'])->name('report-equipment-mutation');

    // Report Print
    Route::get('report-print/data/{level}/{school}/{kelas}', [AdminReportPrintController::class, 'listData'])->name('report-print.data');

    Route::resource('report-print', AdminReportPrintController::class);

    Route::get('report-uts-print-pdf/{id}', [AdminReportPrintController::class, 'utsExportPdf'])->name('report-uts-print-pdf');

    Route::get('report-uas-print-pdf/{id}', [AdminReportPrintController::class, 'uasExportPdf'])->name('report-uas-print-pdf');

    // Report Input
    Route::resource('report', AdminReportController::class);
    
    // Report Value
    Route::resource('report-value', AdminReportValueController::class);

    Route::get('report-value-settings', [AdminReportValueController::class, 'reportValueSettings'])->name('report-value-settings');

    Route::post('report-value-settings/save', [AdminReportValueController::class, 'reportValueSettingsSave'])->name('report-value-settings.save');

    Route::get('report-value/data/{level}/{school}/{kelas}/{mapel}', [AdminReportValueController::class, 'listData'])->name('report-value.data');
    
    // Report Attitude
    Route::resource('report-attitude', AdminReportAttitudeController::class);

    Route::get('report-attitude/data/{level}/{school}/{kelas}', [AdminReportAttitudeController::class, 'listData'])->name('report-attitude.data');

    // Report Attendance
    Route::resource('report-attendance', AdminReportAttendanceController::class);

    Route::get('report-attendance/data/{level}/{school}/{kelas}', [AdminReportAttendanceController::class, 'listData'])->name('report-attendance.data');

    // Report Achievement
    Route::resource('report-achievement', AdminReportAchievementController::class);

    Route::get('report-achievement/data/{level}/{school}/{kelas}', [AdminReportAchievementController::class, 'listData'])->name('report-achievement.data');

    // Report Home Room Teacher Notes
    Route::resource('report-homeroom-teacher-notes', AdminReportHomeRoomTeacherNotesController::class);

    Route::get('report-homeroom-teacher-notes/data/{level}/{school}/{kelas}', [AdminReportHomeRoomTeacherNotesController::class, 'listData'])->name('report-homeroom-teacher-notes.data');

    // Report Attendance
    Route::resource('report-extrakurikuler', AdminReportExtrakurikulerController::class);

    Route::get('report-extrakurikuler/data/{level}/{school}/{kelas}', [AdminReportExtrakurikulerController::class, 'listData'])->name('report-extrakurikuler.data');
    
    // User School
    Route::resource('user-profile', AdminUserProfileController::class);

    // Profile School
    Route::resource('school-profile', AdminSchoolProfileController::class);

    // Curriculum
    Route::get('/curriculum', [AdminCurriculumController::class, 'index'])->name('curriculum');

    // User
    Route::get('user/data', [AdminUserController::class, 'listData'])->name('user.data');

    Route::get('user/search/{email}', [AdminUserController::class, 'search'])->name('user.search');
    
    Route::resource('user', AdminUserController::class);

});



