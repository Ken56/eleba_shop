<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

//>>商户---注册页面
Route::resource('shop','ShopController');
//>>商户修改密码
Route::get('updatepwd', 'ShopController@updatepwd')->name('updatepwd');
Route::post('updatepwd_save', 'ShopController@update_pwd')->name('updatepwd_save');
//>>商户---登录流程
Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');
//>>商户---菜品分类
Route::resource('food_category','FoodCategoryController');
Route::get('foodcategory/{FoodCategory}/is_selected','FoodCategoryController@is_selected')->name('is_selected');
//商户--菜品管理
Route::resource('food_menu','FoodMenuController');
//================>>商家专用图片上传
Route::post('/upload','UploaderController@upload');


