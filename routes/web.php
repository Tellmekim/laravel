<?php

/**
 * 后台路由
 */
 Route::get('/','Home\IndexController@index')->name('index'); //前端首页
 Route::get('experience','Home\IndexController@experience')->name('experience');  //前端首页
 Route::get('checkpoint','Home\IndexController@checkpoint')->name('checkpoint');  //列表页面
 Route::get('success','Home\IndexController@success')->name('success');  //列表页面
 Route::get('study','Home\IndexController@study')->name('study');     //列表页面
 Route::get('login','Home\LoginController@index')->name('userLogin');   //登录
 Route::get('register','Home\LoginController@register')->name('register')->middleware('Login'); ;  //注册
 
  
 Route::get('getCaptcha','Home\LoginController@getCaptcha')->name('getCaptcha');  //前端首页
 
/**后台模块**/
Route::group(['namespace' => 'Admin','prefix' => 'admin'], function (){

    Route::get('login','AdminsController@showLoginForm')->name('login');  //后台登陆页面

    Route::post('login-handle','AdminsController@loginHandle')->name('login-handle'); //后台登陆逻辑

    Route::get('logout','AdminsController@logout')->name('admin.logout'); //退出登录

    /**需要登录认证模块**/
    Route::middleware(['auth:admin','rbac'])->group(function (){

        Route::resource('index', 'IndexsController', ['only' => ['index']]);  //首页

        Route::get('index/main', 'IndexsController@main')->name('index.main'); //首页数据分析

        Route::get('admins/status/{statis}/{admin}','AdminsController@status')->name('admins.status');

        Route::get('admins/delete/{admin}','AdminsController@delete')->name('admins.delete');

        Route::resource('admins','AdminsController',['only' => ['index', 'create', 'store', 'update', 'edit']]); //管理员

        Route::get('roles/access/{role}','RolesController@access')->name('roles.access');

        Route::post('roles/group-access/{role}','RolesController@groupAccess')->name('roles.group-access');

        Route::resource('roles','RolesController',['only'=>['index','create','store','update','edit','destroy'] ]);  //角色

        Route::get('rules/status/{status}/{rules}','RulesController@status')->name('rules.status');

        Route::resource('rules','RulesController',['only'=> ['index','create','store','update','edit','destroy'] ]);  //权限

        Route::resource('actions','ActionLogsController',['only'=> ['index','destroy'] ]);  //日志
    });
});
//Route::namespace('Home')->get('/index','namespace' => 'Home','IndexController@index')->name('index');
//前端模块
/*
Route::group(['namespace' => 'Home','prefix' => 'home'], function (){
    Route::get('index','IndexController@index')->name('index');  //前端首页
    Route::get('login','IndexController@login')->name('login');  //前端首页
    Route::get('experience','IndexController@experience')->name('experience');  //前端首页
	 
	/**需要登录认证模块**/
   /* Route::middleware(['auth:admin','rbac'])->group(function (){

    });*/
//});

