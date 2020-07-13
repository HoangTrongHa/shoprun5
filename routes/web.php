<?php

use Illuminate\Support\Facades\Route;

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
Route::get("/", "user\UserController@index");
Route::get("/contact", "user\UserController@contact");
Route::get("/details/{id}", "user\UserController@details");
Route::get("/prodesc/{id}", "user\UserController@desc")->name("desc");


Route::get("product/addtocart/{id}", "user\UserController@addTocart")->name("addTocart");
Route::get("product/showcart", "user\UserController@showCart")->name("show");
Route::get("product/updatecart", "user\UserController@showCart")->name("update");
Route::get("product/banking", "user\UserController@banking")->name("banking");


Route::get("admin/login","Admin\UserController@getLoginAdmin")->name("admin.login");
Route::post("admin/login","Admin\UserController@postLoginAdmin")->name("admin.post.login");
Route::get("admin/logout","Admin\UserController@logoutAdmin")->name("admin.logout");
Route::get("admin/register","Admin\UserController@getRegisterAdmin")->name("admin.register");
Route::post("admin/save-register","Admin\UserController@postRegisterAdmin")->name("admin.post.register");

Route::get("admin/forgot-password","Admin\UserController@getFromRessetPas")->name("admin.form-reset-pas");
Route::post("admin/forgot-password","Admin\UserController@postFromRessetPas")->name("admin.post.form-reset-pas");
Route::get("admin/password/reset","Admin\UserController@resetPassword")->name('link-resetpas');
Route::post("admin/password/reset","Admin\UserController@saveResetPassword")->name("admin.save-password");
Route::group(["prefix"=>"admin","middleware"=>"admin"],function (){
    Route::get('/','Admin\AdminController@index')->name("admin.home");
    Route::group(["prefix"=>"categories"],function (){
        Route::get("/","Admin\CategorieController@index")->name("admin.categories.index");
        Route::post("/","Admin\CategorieController@store")->name("admin.categories.save");
        Route::get("/edit/{id}","Admin\CategorieController@edit")->name("admin.categories.edit");
        Route::put("/edit/{id}","Admin\CategorieController@update")->name("admin.categories.update");
        Route::get("/delete/{id}","Admin\CategorieController@destroy")->name("admin.categories.delete");
    });
    Route::group(["prefix"=>"brand"],function (){
       Route::get("/","Admin\BrandController@index")->name("admin.brand.index");
       Route::post("/","Admin\BrandController@save")->name("admin.brand.save");
       Route::get("/edit/{id}","Admin\BrandController@edit")->name("admin.brand.edit");
       Route::put("/edit/{id}","Admin\BrandController@update")->name("admin.brand.update");
       Route::get("/delete/{id}","Admin\BrandController@delete")->name("admin.brand.delete");
    });
    Route::group(["prefix"=>"area"],function (){
       Route::get("/","Admin\AreaController@index")->name("admin.area.index");
       Route::post("/","Admin\AreaController@save")->name("admin.area.save");
       Route::get("/edit/{area:slug}","Admin\AreaController@edit")->name("admin.area.edit");
       Route::put("/edit/{area:slug}","Admin\AreaController@update")->name("admin.area.update");
       Route::get("/delete/{area:slug}","Admin\AreaController@delete")->name("admin.area.delete");
    });
    Route::group(["prefix"=>"city"],function (){
        Route::get("/","Admin\CityController@index")->name("admin.city.index");
        Route::post("/","Admin\CityController@save")->name("admin.city.save");
        Route::get("/edit/{city:slug}","Admin\CityController@edit")->name("admin.city.edit");
        Route::put("/edit/{city:slug}","Admin\CityController@update")->name("admin.city.update");
        Route::get("/delete/{city:slug}","Admin\CityController@delete")->name("admin.city.delete");
    });
    Route::group(["prefix"=>"arrtibutes"],function (){
        Route::get("/","Admin\ArrtbController@index")->name("admin.arrtb.index");
        Route::post("/","Admin\ArrtbController@save")->name("admin.arrtb.save");
        Route::get("/edit/{id}","Admin\ArrtbController@edit")->name("admin.arrtb.edit");
        Route::put("/edit/{id}","Admin\ArrtbController@update")->name("admin.arrtb.update");
        Route::get("/delete/{id}","Admin\ArrtbController@delete")->name("admin.arrtb.delete");
    });
    Route::group(["prefix"=>"arrtibute_values"],function (){
        Route::get("/","Admin\ArrtbVlController@index")->name("admin.arrtb-vl.index");
        Route::post("/","Admin\ArrtbVlController@save")->name("admin.arrtb-vl.save");
        Route::get("/edit/{id}","Admin\ArrtbVlController@edit")->name("admin.arrtb-vl.edit");
        Route::put("/edit/{id}","Admin\ArrtbVlController@update")->name("admin.arrtb-vl.update");
        Route::get("/delete/{id}","Admin\ArrtbVlController@delete")->name("admin.arrtb-vl.delete");
    });
    Route::group(["prefix"=>"stores"],function (){
        Route::get("/","Admin\StoreController@index")->name("admin.store.index");
        Route::get("/add","Admin\StoreController@add")->name("admin.store.add");
        Route::post("/add","Admin\StoreController@save")->name("admin.store.save");
        Route::get("/edit/{store:slug}","Admin\StoreController@edit")->name("admin.store.edit");
        Route::put("/edit/{store:slug}","Admin\StoreController@update")->name("admin.store.update");
        Route::get("/delete/{store:slug}","Admin\StoreController@delete")->name("admin.store.delete");
    });
    Route::group(["prefix"=>"products"],function (){
        Route::get("/","Admin\ProductController@index")->name("admin.product.index");
        Route::get("/add","Admin\ProductController@add")->name("admin.product.add");
        Route::post("/add","Admin\ProductController@save")->name("admin.product.save");
        Route::get("/check/{product:slug}","Admin\ProductController@show");
        Route::get("/edit/{product:slug}","Admin\ProductController@edit")->name("admin.product.edit");
        Route::post("/edit/{product:slug}","Admin\ProductController@update")->name("admin.product.update");
        Route::get("/delete/{product:slug}","Admin\ProductController@delete")->name("admin.product.delete");
        Route::get("/delete-img/{id}","Admin\ProductController@delete_img")->name("admin.product-img.delete");

    });
    Route::group(["prefix"=>"ajax"],function (){
        Route::get("area/{Area:id}","Admin\StoreController@getArea")->name("admin.ajax.getarea");
    });
    Route::group(["prefix"=>"account"],function (){
        Route::get("/","Admin\AccountController@index")->name("admin.account.admin");
        Route::get("/info/{id}","Admin\AccountController@infoAccountAdmin")->name("admin.infoAccount");
        Route::put("/info/{id}","Admin\AccountController@updateInfoAccountAdmin")->name("admin.update.infoAccount");
        Route::get("/delete/{id}","Admin\AccountController@deleteAdmin")->name("admin.account.delete.admin");
        Route::get("/grant-right/{id}","Admin\AccountController@grantRightAdmin")->name("admin.account.GrantRight.admin");
        Route::post("/grant-right/{id}","Admin\AccountController@postGrantRightAdmin")->name("admin.account.postGrantRight.admin");
        Route::get("/change-password/{id}","Admin\AccountController@changePasswordAdmin")->name("admin.changePassword");
        Route::post("/change-password/{id}","Admin\AccountController@postChangePasswordAdmin")->name("admin.postChangePassword");
    });
});
