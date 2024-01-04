<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserJobController;

Route::get('/user/registration',[UserController::class,'registration'])->name('registration');
Route::post('/user/registration_process',[UserController::class,'registration_process'])->name('registration.registration_process');
Route::get('/user/login_process',[UserController::class,'login_process'])->name('login.login_process');
Route::group(['middleware'=>'user_auth'],function(){
        Route::get('/user/dashboard',[UserController::class,'dashboard']);
        Route::get('/user/account-details',[UserController::class,'accountdetails']);
        
        Route::post('/user/account-update',[UserController::class,'accountupdate'])->name('user.updateprofile');
        Route::get('/user/change-password',[UserController::class, 'changepassword'])->name('user.changepassword');
        Route::post('/user/update-password',[UserController::class, 'updatepassword'])->name('users.updatepassword');

        Route::get('/user/jobs',[UserJobController::class,'jobs']);
});

Route::get('/user/logout', function () {
    session()->forget('FRONT_USER_LOGIN');
    session()->forget('FRONT_USER_ID');
    session()->forget('FRONT_USER_NAME');
    Session::flush();
    return redirect('/');
});


Route::get('/user/verification/{id}',[UserController::class,'email_verification']);
Route::post('/user/forgot_password',[UserController::class,'forgot_password']);
Route::get('/user/forgot_password_change/{id}',[UserController::class,'forgot_password_change']);
Route::post('/user/forgot_password_change_process',[UserController::class,'forgot_password_change_process']);


Route::get('/user/outside',[UserJobController::class,'jobs'])->name('user.jobs');