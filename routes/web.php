<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\SkillsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CheckListItemController;
use App\Http\Controllers\Admin\UserReviewController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/clear', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
    });


Route::get('/admin-login', [AdminController::class, 'login'])->name('admin1.login');
Route::post('/admin-login', [AdminController::class, 'check'])->name('admin.login');
Route::get('check',[AdminController::class,'check']);

Route::group(['middleware'=>['admin_auth']],function(){
Route::get('dashboard/',[AdminController::class,'dashboard'])->name('admin.dashboard');


Route::get('/skills-check-list/',[SkillsController::class,'checkList'])->name('skills.checkList');
Route::get('/add-check-list-category/',[SkillsController::class,'addCheckList'])->name('skills.addCheckList');
Route::post('/add-check-list/',[SkillsController::class,'storeCheckList'])->name('skills.storeCheckList');
Route::get('/edit-check-list/{id}',[SkillsController::class,'editcheckList'])->name('skills.editcheckList');
Route::post('/update-check-list/{id}',[SkillsController::class,'updatecheckList'])->name('skills.updatecheckList');
Route::post('/update-check-list-status/{id}',[SkillsController::class,'updatecheckListStatus']);
Route::delete('/check-list-delete/{id}', [SkillsController::class, 'destroycheckList'])->name('skills.destroycheckList');


Route::get('/skills-unit-list/',[SkillsController::class,'skillUnitList'])->name('skills.unitList');
Route::get('/add-skills-unit/',[SkillsController::class,'skillAddUnit'])->name('skills.addUnit');
Route::post('/add-skills-unit/',[SkillsController::class,'skilladdUnitStore'])->name('skills.addUnitStore');
Route::get('/edit-skills-unit/{id}',[SkillsController::class,'skillEditunit'])->name('skills.Editunit');
Route::post('/update-skills-unit/{id}',[SkillsController::class,'skillUpdateUnit'])->name('skills.skillUpdateUnit');
Route::post('/update-skill-unit-status/{id}',[SkillsController::class,'updateSkillUnitStatus']);
Route::post('/skill-unit-delete/{id}', [SkillsController::class, 'deleteUnit'])->name('skills.deleteUnit');


Route::get('/skills-category-list/',[CategoryController::class,'CategoryList'])->name('skills.CategoryList');
Route::get('/add-skills-category/',[CategoryController::class,'CategoryAdd'])->name('skills.CategoryAdd');
Route::post('/add-skills-category/',[CategoryController::class,'CategoryStore'])->name('skills.CategoryStore');
Route::get('/edit-skills-category/{id}',[CategoryController::class,'CategoryEdit'])->name('skills.CategoryEdit');
Route::post('/update-skills-category/{id}',[CategoryController::class,'CategoryUpdate'])->name('skills.CategoryUpdate');
Route::post('/update-skill-category-status/{id}',[CategoryController::class,'updateCategoryStatus']);
Route::DELETE('/skill-category-delete/{id}', [CategoryController::class, 'deleteCategory'])->name('skills.deleteCategory');



Route::get('/skills-category-item-list/',[CheckListItemController::class,'CategoryItemList'])->name('skills.CategoryItemList');
Route::get('/add-skills-category-item/',[CheckListItemController::class,'CategoryItemAdd'])->name('skills.CategoryItemAdd');
Route::post('/add-skills-category-item/',[CheckListItemController::class,'CategoryItemStore'])->name('skills.CategoryItemStore');
Route::get('/edit-skills-category-item/{id}',[CheckListItemController::class,'CategoryItemEdit'])->name('skills.CategoryItemEdit');
Route::post('/update-skills-category-item/{id}',[CheckListItemController::class,'CategoryItemUpdate'])->name('skills.CategoryItemUpdate');
Route::post('/update-skill-category-item-status/{id}',[CheckListItemController::class,'updateCategoryItemStatus']);
Route::DELETE('/skill-check-list-item-delete/{id}/{unitId}/{index2}/{top_question}/{question_name}', [CheckListItemController::class, 'deleteCheckListItem'])->name('skills.deleteCheckListItem');
Route::get('/get-units-departments/{checklistId}', [CheckListItemController::class,'getUnitsDepartments']);


//===========================Pages Controller=======================

Route::get('/pages',[PageController::class,'index'])->name('pages.index');
Route::get('/pages/create', [PageController::class, 'create'])->name('pages.create');
Route::post('/pages', [PageController::class, 'store'])->name('pages.store');
Route::get('/pages/{page}/edit', [PageController::class, 'edit'])->name('pages.edit');
Route::put('/pages/{page}', [PageController::class, 'update'])->name('pages.update');
Route::post('/pages/{page}/status', [PageController::class, 'updateStatus'])->name('pages.updateStatus');
Route::delete('/pages/{page}', [PageController::class, 'destroy'])->name('pages.destroy');



//===========================Posts Controller=======================

Route::get('/posts',[PostsController::class,'index'])->name('posts.index');
Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}/edit', [PostsController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostsController::class, 'update'])->name('posts.update');
Route::post('/posts/{post}/status', [PostsController::class, 'updateStatus'])->name('posts.updateStatus');
Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy');


Route::get('/posts-category',[PostsController::class,'postsCategory'])->name('posts.postsCategory');

// User Review Controller===============

Route::get('/user-review',[UserReviewController::class,'userReview'])->name('skills.UserReview');



// Admin Forget Password===============

Route::get('profile-setting',[AdminController::class,'profileSetting'])->name('admin.profileConfiguration');
Route::get('update-profile',[AdminController::class,'profileUpdateSetting'])->name('admin.profileUpdateSetting');
Route::post('update-profile',[AdminController::class,'profileUpdateStore'])->name('admin.profileUpdateStore');
Route::post('update-address',[AdminController::class,'profileUpdateStore'])->name('admin.profileAddressUpdateStore');
Route::post('update-social',[AdminController::class,'profileUpdateStore'])->name('admin.profileSocialUpdateStore');

Route::get('update-password',[AdminController::class,'profilePasswordSetting'])->name('admin.profilePasswordSetting');
Route::post('update-password',[AdminController::class,'profilePasswordUpdateSetting'])->name('admin.profilePasswordUpdateSetting');
Route::get('logout',[AdminController::class,'adminlogout'])->name('admin.logout');
});

Route::get('/forgot-password/',[AdminController::class,'ForgotPasswordPage'])->name('admin.ForgotPasswordPage');

Route::post('forgot-password',[AdminController::class,'sendPasswordResetToken'])->name('admin.sendPasswordResetToken');
Route::get('forgot-password/{email}/{token}',[AdminController::class,'getPassword'])->name('admin.getPassword');
Route::post('forgot-password/{email}/{token}',[AdminController::class,'updaterestpassword'])->name('admin.updaterestpassword');

require __DIR__.'/frontUI.php';
require __DIR__.'/company.php';
require __DIR__.'/user.php';