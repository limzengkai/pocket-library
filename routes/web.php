<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NilamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminAdminController;
use App\Http\Controllers\attendanceController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\AdminTeacherController;
use App\Http\Controllers\TeacherBookingController;
use App\Http\Controllers\AdminAttendanceController;
use App\Http\Controllers\Teacher_nilam_Controller;
use App\Http\Controllers\AdminAnnouncementController;


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

//|--------------------------------------------------------------------------
//|                         Admin Route
//|--------------------------------------------------------------------------
Route::prefix('admin')->group(function(){
    
    Route::get('/login',[AdminController::class, 'Index'])->name('login_form');
    Route::post('/login/auth',[AdminController::class, 'Login'])->name('admin.login');
    Route::get('/dashboard',[AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout',[AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');
    Route::get('/register',[AdminController::class, 'AdminRegister'])->name('admin.register')->middleware('admin');
    Route::post('/register/create',[AdminController::class, 'AdminRegisterCreate'])->name('admin.register.create')->middleware('admin');
    Route::resource('student', AdminUserController::class)->middleware('admin');
    Route::resource('teacher', AdminTeacherController::class)->middleware('admin');
    Route::resource('admin', AdminAdminController::class)->middleware('admin');
    Route::resource('announcement', AdminAnnouncementController::class)->middleware('admin');
    Route::resource('booking', AdminBookingController::class)->middleware('admin');
    Route::get('attendance', [AdminAttendanceController::class, 'index'] )->name('attendance.index')->middleware('admin');
    Route::post('attendance', [AdminAttendanceController::class, 'search'] )->name('attendance.search')->middleware('admin');

    
});
//##########################################################################################################################

//|--------------------------------------------------------------------------
//|                         Teacher Route
//|--------------------------------------------------------------------------
Route::prefix('teacher')->group(function(){
    
    Route::get('/login',[TeacherController::class, 'Index'])->name('teacher_login_form');
    Route::post('/login/auth',[TeacherController::class, 'TeacherLogin'])->name('teacher.login');
    Route::get('/dashboard',[TeacherController::class, 'TeacherDashboard'])->name('teacher.dashboard')->middleware('teacher');
    Route::get('/logout',[TeacherController::class, 'TeacherLogout'])->name('teacher.logout')->middleware('teacher');
    Route::get('/register',[TeacherController::class, 'TeacherRegister'])->name('teacher.register')->middleware('admin');
    Route::post('/register/create',[TeacherController::class, 'TeacherRegisterCreate'])->name('teacher.register.create')->middleware('admin');
    
    //Attendance
    Route::get('attendance',[attendanceController::class, 'Index'])->name('teacher.attendance')->middleware('teacher');
    Route::post('attendance',[attendanceController::class, 'search'])->name('teacher.attendance.search')->middleware('teacher');
    Route::get('/attendance/show',[attendanceController::class, 'show'])->name('attendance.show')->middleware('teacher'); 
    Route::post('/attendance/store', [attendanceController::class, 'store'])->name('attendance.store')->middleware('teacher');
    
    //Teacher Profile
    Route::get('/profile', [ProfileController::class, 'TeacherIndex'])->name('teacher.profile')->middleware('teacher');
    Route::post('/profile/update', [ProfileController::class, 'TeacherEdit'])->name('teacher.profile.update')->middleware('teacher');
    Route::post('/profile/image/update', [ProfileController::class, 'teacherstore'])->name('teacher.image.update')->middleware('teacher');
    

    //Nilam
    Route::resource('tnilam',Teacher_nilam_Controller::class)->middleware('teacher');
    Route::get('/nilam/search', [Teacher_nilam_Controller::class, 'search'])->middleware('teacher');
    
    //Booking
    Route::get('/booking',[TeacherBookingController::class, 'personal'])->name('teacher.booking')->middleware('teacher');
    Route::get('/booking/submit',[TeacherBookingController::class, 'create'])->name('teacher.booking.create')->middleware('teacher'); 
    Route::get('/booking/submit/store',[TeacherBookingController::class, 'store'])->name('teacher.booking.store')->middleware('teacher'); 
    Route::get('/booking/edit/{id}',[TeacherBookingController::class, 'edit'])->name('teacher.booking.edit')->middleware('teacher');
    Route::put('/booking/update/{id}',[TeacherBookingController::class, 'update'])->name('teacher.booking.update')->middleware('teacher');
    Route::delete('/booking/delete/{id}',[TeacherBookingController::class, 'destroy'])->name('teacher.booking.delete')->middleware('teacher');
    Route::get('/booking/show',[TeacherBookingController::class, 'show'])->name('teacher.booking.show')->middleware('teacher');    
});
//##########################################################################################################################

//|--------------------------------------------------------------------------
//|                         Student Route
//|--------------------------------------------------------------------------
Route::prefix('student')->group(function(){

    //Login, dashboard, and register
    Route::get('/login',[StudentController::class, 'Index'])->name('student_login_form');
    Route::post('/login/auth',[StudentController::class, 'StudentLogin'])->name('student.login');
    Route::get('/dashboard',[StudentController::class, 'StudentDashboard'])->name('student.dashboard')->middleware('student');
    Route::get('/logout',[StudentController::class, 'StudentLogout'])->name('student.logout')->middleware('student');
    Route::get('/register',[StudentController::class, 'StudentRegister'])->name('student.register');
    Route::post('/register/create',[StudentController::class, 'StudentRegisterCreate'])->name('student.register.create');
    //Student Profile
    Route::get('/profile', [ProfileController::class, 'StudentIndex'])->name('student.profile')->middleware('student');
    Route::post('/profile/update', [ProfileController::class, 'StudentEdit'])->name('student.profile.update')->middleware('student');
    Route::post('/profile/image/update', [ProfileController::class, 'store'])->name('student.image.update')->middleware('student');
    
    //Attendance
    Route::get('attendance',[attendanceController::class, 'StudentIndex'])->name('student.attendance')->middleware('student');
    Route::post('attendance',[attendanceController::class, 's_search'])->name('student.attendance.search')->middleware('student');
    Route::get('/attendance/qrcode',[attendanceController::class, 'Qrcode'])->name('student.qrcode')->middleware('student'); 

    //Nilam
    Route::resource('nilam',NilamController::class)->middleware('student'); // can make as resource
    
});
//##########################################################################################################################

Route::get('/', function () {
    return view('login');
});

Route::get('/teacher/nilam/view', function () {
    return view('teacher.nilam_view');
});

Route::get('/contact', function () {
    return view('contact');
});