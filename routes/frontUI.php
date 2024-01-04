<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Admin\ProductInquiryController;

//Front Controller=================
Route::get('/home', [FrontController::class, 'index']);
Route::get('/resources/skills-checklists', [FrontController::class, 'resourceSkillCheckList'])->name('rsc');
Route::post('/resources/skills-checklists-submit', [FrontController::class, 'submitSkillzReview'])->name('submitSkillzReview');

Route::get('/about-us', [FrontController::class, 'aboutUs'])->name('front.aboutus');
Route::get('/pricing', [FrontController::class, 'pricing'])->name('pricing');
Route::get('/training', [FrontController::class, 'training'])->name('training');
Route::get('reach-at-us-fornt', [FrontController::class, 'ReachUs'])->name('front.ReachUs');

Route::get('/checklist-item-{checklist_id}-{unit_id}', [FrontController::class, 'checklistItems']);


Route::get('/traing', [FrontController::class, 'traing']);
Route::get('/{slug}',[FrontController::class,'fetch_page']);
Route::get('/subscription-plan',[FrontController::class,'pricing']);
Route::post('/user/select-plan',[FrontController::class,'selectPlan'])->name('subscription.select-plan');
Route::get('/user/select-plan-validity',[FrontController::class,'selectValidityPeriod'])->name('subscription.validity');
Route::get('/', [FrontController::class, 'index']);
Route::post('submit',[ProductInquiryController::class,'contact_submit'])->name('contact.submit');



