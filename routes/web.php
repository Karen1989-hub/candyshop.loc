<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPagesControllers;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\HomePageEditController;
use App\Http\Controllers\AboutCompanyController;
use App\Http\Controllers\ShopPageController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\userController;
use App\Http\Controllers\OrdersController;

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
Route::get('errorAboutCountInStock',[ShopPageController::class,'getErrorAboutCountInStockPage'])->name('errorAboutCountInStock');
Route::get('errorAboutMinSalerCount',[ShopPageController::class,'errorAboutMinSalerCount'])->name('errorAboutMinSalerCount');
Route::get('/',[FrontPagesControllers::class,'getHomePage'])->name('home');
Route::get('/shop',[FrontPagesControllers::class,'getShopPage'])->name('shop');
Route::get('/shop/{category}',[FrontPagesControllers::class,'getShopPage']);
Route::get('/shopDetail/{id}',[FrontPagesControllers::class,'getDetailShopPage']);
Route::get('/shopDetail',[FrontPagesControllers::class,'getDetailShopPage2'])->name('getDetailShopPage2');
Route::get('/getOrderPage',[FrontPagesControllers::class,'getOrderPage'])->name('getOrderPage');
Route::get('/aboutUs',[FrontPagesControllers::class,'getAboutUsPage'])->name('aboutUs');
Route::get('/awards',[FrontPagesControllers::class,'getАwardsPage'])->name('awards');
Route::get('/news',[FrontPagesControllers::class,'getNewsPage'])->name('news');
Route::get('/singlNews/1',[FrontPagesControllers::class,'getSinglNews'])->name('getSinglNews');
Route::get('/contactUs',[FrontPagesControllers::class,'getContactUsPage'])->name('contactUs');
Route::get('/admin',[AdminLoginController::class,'getAdminLoginPage'])->name('getAdminLoginPage');
Route::get('/userRegistrationPage',[FrontPagesControllers::class,'userRegistrationPage'])->name('userRegistrationPage');
Route::get('/wholesalerRegistration',[FrontPagesControllers::class,'wholesalerRegistration'])->name('wholesalerRegistration');


Route::prefix('/admin')->group(function (){
    Route::post('/checkAdminLogin',[AdminLoginController::class,'checkAdminLogin'])->name('checkAdminLogin');
    Route::get('/goOut',[AdminLoginController::class,'goOut'])->middleware('admin')->name('goOut');
    Route::get('/getDiscountsPage',[AdminPagesController::class,'getDiscountsPage'])->middleware('admin')->name('getDiscountsPage');
    Route::get('/getEditSliderPage',[AdminPagesController::class,'getEditSliderPage'])->middleware('admin')->name('getEditSliderPage');
    Route::get('/getEditProduktCategory',[AdminPagesController::class,'getEditProduktCategory'])->middleware('admin')->name('getEditProduktCategory');
    Route::get('/getEditContactData',[AdminPagesController::class,'getEditContactData'])->middleware('admin')->name('getEditContactData');
    Route::get('/getCreateProduct',[AdminPagesController::class,'getCreateProduct'])->middleware('admin')->name('getCreateProduct');
    Route::get('/getDeleteOrEditProduct',[AdminPagesController::class,'getDeleteOrEditProduct'])->middleware('admin')->name('getDeleteOrEditProduct');
    Route::get('/getEditCompanyInfo',[AdminPagesController::class,'getEditCompanyInfo'])->middleware('admin')->name('getEditCompanyInfo');
    Route::get('/getEditPersonalInfo',[AdminPagesController::class,'getEditPersonalInfo'])->middleware('admin')->name('getEditPersonalInfo');
    Route::get('/getEditAwards',[AdminPagesController::class,'getEditAwards'])->middleware('admin')->name('getEditAwards');
    Route::get('/getEditNews',[AdminPagesController::class,'getEditNews'])->middleware('admin')->name('getEditNews');
    Route::get('/getMessagesList',[AdminPagesController::class,'getMessagesList'])->middleware('admin')->name('getMessagesList');
    Route::post('/createMessage',[MessagesController::class,'createMessage'])->middleware('admin')->name('createMessage');
    Route::get('/deleteMessage/{id}',[MessagesController::class,'deleteMessage'])->middleware('admin')->name('deleteMessage');
    Route::get('/getSingleMessage/{id}',[MessagesController::class,'getSingleMessage'])->middleware('admin')->name('getSingleMessage');
    Route::get('/getRetailOrdersList',[AdminPagesController::class,'getRetailOrdersList'])->middleware('admin')->name('getRetailOrdersList');
    Route::get('/getSinglRetailOrdersList/{id}',[AdminPagesController::class,'getSinglRetailOrdersList'])->middleware('admin')->name('getSinglRetailOrdersList');
    Route::get('/getWholesalerOrdersList',[AdminPagesController::class,'getWholesalerOrdersList'])->middleware('admin')->name('getWholesalerOrdersList');
    Route::get('/getSingWholesalerOrders/{id}',[AdminPagesController::class,'singWholesalerOrders'])->middleware('admin')->name('singWholesalerOrders');

    Route::get('/getWholesaleRestrictions',[AdminPagesController::class,'getWholesaleRestrictions'])->middleware('admin')->name('getWholesaleRestrictions');
    Route::post('/updateMinSaleCountForWholesaler',[AdminPagesController::class,'updateMinSaleCountForWholesaler'])->middleware('admin')->name('updateMinSaleCountForWholesaler');
    Route::get('/getWholesalersRegistration',[AdminPagesController::class,'getWholesalersRegistration'])->middleware('admin')->name('getWholesalersRegistration');
    Route::post('/createMessage',[MessagesController::class,'createMessage'])->middleware('admin')->name('createMessage');
    Route::get('/deleteMessage/{id}',[MessagesController::class,'deleteMessage'])->middleware('admin')->name('deleteMessage');
    Route::get('/getSingleMessage/{id}',[MessagesController::class,'getSingleMessage'])->middleware('admin')->name('getSingleMessage');
});

Route::prefix('/frontEdit')->group(function (){
    Route::post('/createDiscount',[DiscountController::class,'createDiscount'])->middleware('admin')->name('createDiscount');
    Route::get('/deleteDiscount/{id}',[DiscountController::class,'deleteDiscount'])->middleware('admin')->name('deleteDiscount');
    Route::post('/createSliderPage',[HomePageEditController::class,'createSliderPage'])->middleware('admin')->name('createSliderPage');
    Route::get('/deleteSliderPage/{id}',[HomePageEditController::class,'deleteSliderPage'])->middleware('admin')->name('deleteSliderPage');
    Route::post('/createCategory',[HomePageEditController::class,'createCategory'])->middleware('admin')->name('createCategory');
    Route::get('/deleteCategory/{id}',[HomePageEditController::class,'deleteCategory'])->middleware('admin')->name('deleteCategory');
    Route::post('/editContactData',[HomePageEditController::class,'editContactData'])->middleware('admin')->name('editContactData');
    Route::post('/updaetCompanyInfo',[AboutCompanyController::class,'updaetCompanyInfo'])->middleware('admin')->name('updaetCompanyInfo');
    Route::post('/createNewEmployee',[AboutCompanyController::class,'createNewEmployee'])->middleware('admin')->name('createNewEmployee');
    Route::get('/deleteEmployee/{id}',[AboutCompanyController::class,'deleteEmployee'])->middleware('admin')->name('deleteEmployee');
    Route::post('/createProduct',[ShopPageController::class,'createProduct'])->middleware('admin')->name('createProduct');
    Route::get('/deleteProduct/{id}',[ShopPageController::class,'deleteProduct'])->middleware('admin')->name('deleteProduct');
    Route::post('/editProductPrice',[ShopPageController::class,'editProductPrice'])->middleware('admin')->name('editProductPrice');
    Route::post('/createAwars',[AwardController::class,'createAwars'])->middleware('admin')->name('createAwars');
    Route::get('/deleteAward/{id}',[AwardController::class,'deleteAward'])->middleware('admin')->name('deleteAward');
    Route::post('/createNews',[NewsController::class,'createNews'])->middleware('admin')->name('createNews');
    Route::get('/deleteNews/{id}',[NewsController::class,'deleteNews'])->middleware('admin')->name('deleteNews');
});
Route::prefix('/user')->group(function (){
    Route::post('/createUser',[userController::class,'createUser'])->name('createUser');
    Route::get('/signUp',[userController::class,'signUp'])->name('signUp');
    Route::post('/signIn',[userController::class,'signIn'])->name('signIn');
    Route::get('/addInBasket/{id}',[userController::class,'addInBasket'])->name('addInBasket');
    Route::post('/updateInBasket',[userController::class,'updateInBasket'])->name('updateInBasket');
    Route::get('/deleteInBasket/{id}/{count}',[userController::class,'deleteInBasket'])->name('deleteInBasket');
    Route::post('/createUserOrder',[OrdersController::class,'createUserOrder'])->name('createUserOrder');
    Route::get('/updateUserOrderStatus/{id}',[OrdersController::class,'updateUserOrderStatus'])->name('updateUserOrderStatus');
    Route::get('/deleteUserOrder/{id}',[OrdersController::class,'deleteUserOrder'])->middleware('admin')->name('deleteUserOrder');
});


