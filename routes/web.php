<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPagesControllers;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\HomePageEditController;
use App\Http\Controllers\AboutCompanyController;
use App\Http\Controllers\ShopPageController;

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
Route::fallback(function (){return abort('404');});
Route::get('/',[FrontPagesControllers::class,'getHomePage'])->name('home');
Route::get('/shop',[FrontPagesControllers::class,'getShopPage'])->name('shop');
Route::get('/aboutUs',[FrontPagesControllers::class,'getAboutUsPage'])->name('aboutUs');
Route::get('/awards',[FrontPagesControllers::class,'getАwardsPage'])->name('awards');
Route::get('/news',[FrontPagesControllers::class,'getNewsPage'])->name('news');
Route::get('/contactUs',[FrontPagesControllers::class,'getContactUsPage'])->name('contactUs');
Route::get('/admin',[AdminLoginController::class,'getAdminLoginPage'])->name('getAdminLoginPage');

Route::prefix('/admin')->group(function (){
    Route::post('/checkAdminLogin',[AdminLoginController::class,'checkAdminLogin'])->name('checkAdminLogin');
    Route::get('/goOut',[AdminLoginController::class,'goOut'])->name('goOut');
    Route::get('/getDiscountsPage',[AdminPagesController::class,'getDiscountsPage'])->name('getDiscountsPage');
    Route::get('/getEditSliderPage',[AdminPagesController::class,'getEditSliderPage'])->name('getEditSliderPage');
    Route::get('/getEditProduktCategory',[AdminPagesController::class,'getEditProduktCategory'])->name('getEditProduktCategory');
    Route::get('/getEditContactData',[AdminPagesController::class,'getEditContactData'])->name('getEditContactData');
    Route::get('/getCreateProduct',[AdminPagesController::class,'getCreateProduct'])->name('getCreateProduct');
    Route::get('/getDeleteOrEditProduct',[AdminPagesController::class,'getDeleteOrEditProduct'])->name('getDeleteOrEditProduct');
    Route::get('/getEditCompanyInfo',[AdminPagesController::class,'getEditCompanyInfo'])->name('getEditCompanyInfo');
    Route::get('/getEditPersonalInfo',[AdminPagesController::class,'getEditPersonalInfo'])->name('getEditPersonalInfo');
    Route::get('/getEditAwards',[AdminPagesController::class,'getEditAwards'])->name('getEditAwards');

});

Route::prefix('/frontEdit')->group(function (){
    Route::post('/createDiscount',[DiscountController::class,'createDiscount'])->name('createDiscount');
    Route::get('/deleteDiscount/{id}',[DiscountController::class,'deleteDiscount'])->name('deleteDiscount');
    Route::post('/createSliderPage',[HomePageEditController::class,'createSliderPage'])->name('createSliderPage');
    Route::get('/deleteSliderPage/{id}',[HomePageEditController::class,'deleteSliderPage'])->name('deleteSliderPage');
    Route::post('/createCategory',[HomePageEditController::class,'createCategory'])->name('createCategory');
    Route::get('/deleteCategory/{id}',[HomePageEditController::class,'deleteCategory'])->name('deleteCategory');
    Route::post('/editContactData',[HomePageEditController::class,'editContactData'])->name('editContactData');
    Route::post('/updaetCompanyInfo',[AboutCompanyController::class,'updaetCompanyInfo'])->name('updaetCompanyInfo');
    Route::post('/createNewEmployee',[AboutCompanyController::class,'createNewEmployee'])->name('createNewEmployee');
    Route::get('/deleteEmployee/{id}',[AboutCompanyController::class,'deleteEmployee'])->name('deleteEmployee');
    Route::post('/createProduct',[ShopPageController::class,'createProduct'])->name('createProduct');
});
