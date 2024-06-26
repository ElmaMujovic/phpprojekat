<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Front\AdminController;
use App\Http\Controllers\Front\CourseController;
use App\Http\Controllers\Front\NewsController;
use App\Http\Controllers\Front\StudentController;
use App\Http\Controllers\Front\TeacherController;
use App\Http\Controllers\Front\UserController;  
use App\Http\Controllers\Front\MyProfileController; 

Route::get('/', 'App\Http\Controllers\Front\HomePageController@index')->name('front.homepage');
Route::get('/courses', 'App\Http\Controllers\Front\CoursePageController@courses');

Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@register')->middleware('alreadyLoggedIn');
Route::post('/register-user', [RegisterController::class, 'create'])->name('register-user');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('/login',[LoginController::class,'showContact'])->middleware('alreadyLoggedIn');
Route::post('login-user', [LoginController::class,'loginUser'])->name('login-user');

Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');

Route::get('/adminpage', [AdminController::class, 'adminpage'])->middleware('checkAdmin');
Route::get('adminpage',[AdminController::class, 'show'])->middleware('checkAdmin');
Route::get('adminpage/{id}',[AdminController::class, 'AcceptR'])->name('AcceptR')->middleware('checkAdmin');
Route::post('adminpage/{id}',[AdminController::class, 'DeclineR'])->name('DeclineR')->middleware('checkAdmin');
Route::delete('adminpage/{id}',[AdminController::class, 'deleteUser'])->name('deleteUser')->middleware('checkAdmin');
Route::get('/news',[NewsController::class, 'showNews'])->middleware('checkAdmin');
Route::get('news',[NewsController::class, 'showN'])->middleware('checkAdmin');
Route::post('store', [NewsController::class, 'store'])->name('store')->middleware('checkAdmin');
Route::delete('/news/{news}',[NewsController::class, 'deleteNews'])->name('deleteNews')->middleware('checkAdmin');
Route::get('/coontact',[AdminController::class, 'showContact'])->middleware('checkAdmin');
Route::put('/coontact/{contact}',[AdminController::class,'update'])->name('update')->middleware('checkAdmin');


Route::get('/teacherpage', [TeacherController::class, 'teacherpage'])->middleware('checkTeacher');
Route::post('addCourse/', [CourseController::class,'addCourse'])->name('addCourse')->middleware('checkTeacher');
Route::post('addLectures/', [TeacherController::class,'addLectures'])->name('addLectures')->middleware('checkTeacher');
Route::get('teacherpage', [TeacherController::class, 'showCourses'])->middleware('checkTeacher');
Route::get('teacherpage', [TeacherController::class, 'showClosedCourses'])->middleware('checkTeacher');
Route::get('teacherpage/{id}',[TeacherController::class, 'closeCourses'])->middleware('checkTeacher');
Route::post('teacherpage/{id}',[TeacherController::class, 'closeCourses'])->middleware('checkTeacher');
Route::post('addTest/', [TeacherController::class,'addTest'])->name('addTest')->middleware('checkTeacher');
Route::get('/test',[TeacherController::class, 'showTest'])->middleware('checkTeacher');
Route::get('/analisis',[TeacherController::class, 'showstt'])->middleware('checkTeacher');
Route::get('/informacije/{id}',[TeacherController::class, 'showinformation'])->middleware('checkTeacher');
Route::post('addQA/', [TeacherController::class,'addQA'])->name('addQA')->middleware('checkTeacher');

Route::get('/studentpage', [StudentController::class, 'studentpage'])->middleware('checkStudent');
Route::get('/download/{file}',[StudentController::class, 'download'])->middleware('checkStudent');
Route::post('enrolledCourse/', [StudentController::class,'enrolledCourse'])->name('enrolledCourse')->middleware('checkTeacher');
Route::get('/studentcourse', [StudentController::class, 'studentcourse'])->middleware('checkStudent');
Route::get('/testload/{id}', [StudentController::class, 'studenttest'])->middleware('checkStudent');
Route::post('student/submit_question', [StudentController::class, 'submit_question'])->middleware('checkStudent');
Route::get('/studentresult', [StudentController::class, 'showresult'])->middleware('checkStudent');

Auth::routes();


Route::get('/sta_je_stem', function () {
    return view('sta_je_stem'); 
})->name('sta_je_stem');

Route::get('/zasto_stem', function () {
    return view('zasto_stem');
})->name('zasto_stem');

Route::get('/kako_stem', function () {
    return view('kako_stem');
})->name('kako_stem');

Route::get('/vezbe_i_aktivnosti', function () {
    return view('vezbe_i_aktivnosti');
})->name('vezbe_i_aktivnosti');

Route::get('/poucne', function () {
    return view('poucne');
})->name('poucne');

Route::get('/zabava', function () {
    return view('zabava');
})->name('zabava');

Route::get('/resursi', function () {
    return view('resursi');
})->name('resursi');

Route::get('/profile', function () {
    $user = Auth::user();
    return view('profile', compact('user'));
})->middleware('auth')->name('profile.show');

Route::post('/show-correct-questions', [TeacherController::class, 'showCorrectQuestions'])->name('showCorrectQuestions');
Route::get('/polaznici', [TeacherController::class, 'polaznici'])->name('polaznici');
