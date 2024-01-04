<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Company\JobController;
use App\Http\Controllers\Company\JobMatchingController;


Route::get('/company/regiater', [CompanyController::class, 'regiser']);
Route::post('/company/regiater', [CompanyController::class, 'registration_process'])->name('compnay.register');
Route::get('/company/verification/{id}',[CompanyController::class,'email_verification']);
Route::get('/company/login', [CompanyController::class, 'login'])->name('compnay.login');
Route::post('/company/login', [CompanyController::class, 'UserVerify'])->name('compnay.UserVerify');

Route::get('/company/logout', function () {
    session()->forget('COMPANY_LOGIN');
    session()->forget('COMPANY_NAME');
    return redirect('/company/login');
});


Route::group(['middleware'=>['compnay_auth']],function(){
    Route::get('/company/dashboard',[CompanyController::class,'dashboard'])->name('compnay.dashboard');
    Route::get('profile-setting',[CompanyController::class,'profileSetting'])->name('compnay.cprofileSetting');
    Route::get('/company/update-profile',[CompanyController::class,'profileUpdateSetting'])->name('compnay.profileUpdateSetting');
    Route::post('/company/update-profile',[CompanyController::class,'profileUpdateStore'])->name('compnay.profileUpdateStore');
    Route::get('/company/update-password',[CompanyController::class,'profilePasswordSetting'])->name('compnay.profilePasswordSetting');
    Route::post('/company/update-password',[CompanyController::class,'profilePasswordUpdateSetting'])->name('compnay.profilePasswordUpdateSetting');
  

    //Job Listing,Adding Controller routs
Route::get('/company/job-listing/',[JobController::class,'listing'])->name('skills.jobList');
Route::get('/company/add-job/',[JobController::class,'addJob'])->name('skills.addJob');
Route::post('/compnay/add-job/',[JobController::class,'storeJob'])->name('skills.storeJob');
Route::get('/company/edit-job/{id}',[JobController::class,'editJob'])->name('skills.editJob');
Route::post('/company/update-job/{id}',[JobController::class,'updateJob'])->name('skills.updateJob');
Route::post('/company/update-job-status/{id}',[JobController::class,'updateJobStatus']);
Route::post('/company/delete-job/{id}', [JobController::class, 'deleteJob'])->name('skills.deleteJob');

    //Job Applicant Matching Module
    Route::get('/company/job-applicant-matching/',[JobMatchingController::class,'listingJobMatch'])->name('skills.listingJobMatch');
    Route::get('/company/job-matching/{departmentID}',[JobMatchingController::class,'RequirementwiseJob'])->name('company.departmentWise');
    Route::get('/company/requirement-job-matching/{requirementID}',[JobMatchingController::class,'titleWiseJob'])->name('company.requirementWise');
    Route::get('/company/view-applicant-review/{applicantID}',[JobMatchingController::class,'viewApplicantReview'])->name('company.viewApplicantReview');
    Route::get('/company/contact-applicant/{applicantID}/{title}',[JobMatchingController::class,'contactApplicant'])->name('company.contactApplicant');
    Route::post('/company/save-applicant-data/',[JobMatchingController::class,'pingApplicant'])->name('send.email.and.save');



});

Route::get('/company/forgot-password',[CompanyController::class,'forgotpassword'])->name('compnay.forgotpassword');
Route::post('/company/forgot-password',[CompanyController::class,'UserForgotPasswordCheckEmail'])->name('compnay.UserForgotPasswordCheckEmail');
Route::get('/company/forgot-password/{email}/{token}',[CompanyController::class,'GetPassword'])->name('GetPassword');
Route::post('/company/forgot-password/{email}/{token}',[CompanyController::class,'Resetpassword'])->name('Resetpassword');