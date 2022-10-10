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


Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'IndexController@index')->name('index');
Route::match(['get','post'],'/track-order',[
    'uses'=>'IndexController@trackOrder'
]);
Route::match(['get','post'],'/merchant',[
    'uses'=>'AdminController@login'
]);
Route::match(['get','post'],'/merchant/register',[
    'uses'=>'AdminController@register'
]);
Route::match(['get','post'],'/merchant/forgot-password',[
    'uses'=>'AdminController@forgotPassword'
]);
Route::match(['get', 'post'],'/password/resetPassword/{token}',[
    'uses'=>'AdminController@ResetPassword'
]);
//confirm email
Route::get('/confirm/{code}',[
    'uses'=>'AdminController@confirmEmail'
]);
Route::group(['middleware' =>['merchantlogin']], function(){
    Route::get('/merchant/dashboard', 'MerchantController@dashboard')->name('dashboard');
    Route::match(['get','post'],'/merchant/settings',[
        'uses'=>'MerchantController@settings'
    ]);
    Route::get('/merchant/check-pwd', 'MerchantController@checkPwd');

    Route::match(['get','post'],'/merchant/update-password',[
        'uses'=>'MerchantController@updatePassword'
    ]);
    
    Route::match(['get','post'],'/merchant/pickup',[
        'uses'=>'MerchantController@pickUp'
    ]);
    Route::match(['get','post'],'/merchant/view-order',[
        'uses'=>'MerchantController@viewOrder'
    ]);
    Route::match(['get','post'],'/merchant/view-order/{orderNo}',[
        'uses'=>'MerchantController@viewOrderDetail'
    ]);
    Route::match(['get','post'],'/order/search',[
        'uses'=>'MerchantController@orderSearch'
    ]);
    Route::match(['get','post'],'/search-filter',[
        'uses'=>'MerchantController@searchFilter'
    ]);
    Route::match(['get','post'],'/merchant/edit_profile',[
        'uses'=>'MerchantController@editDetails'
    ]);
    Route::get('/merchant/view_profile', 'MerchantController@viewProfile');
    Route::match(['get','post'],'/merchant/view_merchant',[
        'uses'=>'AdminController@viewMerchant'
    ]); 
    Route::post('/order/updateStatus/{orderNo}', 'MerchantController@orderStatusUpdate');
    Route::get('/merchant/status/{id}', 'AdminController@changeStatus');
    Route::get('/merchant/adminstatus/{id}', 'AdminController@changeAdminStatus'); 
    //services
    Route::match(['get','post'],'/merchant/our-services',[
        'uses'=>'AdminController@ourServices'
    ]);
    Route::get('/merchant/delete-services', 'AdminController@deleteService');
    Route::match(['get','post'],'/merchant/edit-services/{id}',[
        'uses'=>'AdminController@editServices'
    ]);
    //aboutus
    Route::match(['get','post'],'/merchant/about-us',[
        'uses'=>'AdminController@aboutUs'
    ]);
    Route::get('/merchant/delete-about-us', 'AdminController@deleteAbout');

    Route::match(['get','post'],'/merchant/edit-about-us/{id}',[
        'uses'=>'AdminController@editAbout'
    ]);
    //header
    Route::match(['get','post'],'/merchant/setting/header',[
        'uses'=>'AdminController@viewLogo'
    ]);
    Route::post('/merchant/logo/{id}', 'AdminController@editLogo');
    //footer
    Route::match(['get','post'],'/merchant/setting/footer',[
        'uses'=>'AdminController@viewfooter'
    ]);
    Route::post('/merchant/edit-footer/{id}', 'AdminController@editFooter');
});
 Route::match(['get','post'],'/contact',[
        'uses'=>'IndexController@contact'
    ]);

Route::get('/logout', 'MerchantController@logout')->name('logout');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
