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

Route::get('/', function () {
    return view('yyc_home.home');
});

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
//审核不过的界面
Route::get('shenghe',function (){
    return view('sessions.shenhebuguo');
})->name('shenghe');
//>>活动管理
Route::resource('/activity','ActivityController');
//商户端- 订单管理
Route::resource('/order','OrderController');
//订单发货
Route::get('order/{order}/fahuo','OrderController@fahuo')->name('fahuo');
//订单量统计
Route::get('/dingdan','OrderController@dingdan')->name('dingdan');
//订单量统计
Route::get('/caipin','OrderController@caipin')->name('caipin');
//抽奖报名查看
Route::resource('/events','EventsController');
//抽奖提交报名
Route::get('events/{event}/baoming','EventsController@baoming')->name('baoming');



