<?php

/**
 * 后台路由
 */
 Route::get('/','Home\IndexController@index')->name('index'); //前端首页
 Route::get('experience','Home\IndexController@experience')->name('experience');  //前端首页
 
 Route::get('starList','Home\StarController@starList')->name('starList');  //列表页
 

 Route::get('success','Home\IndexController@success')->name('success');  //成功

 Route::get('login','Home\LoginController@index')->name('userLogin');   //登录
 Route::get('register','Home\LoginController@register')->name('register');   //登录
 Route::get('starindex','Home\StarController@index')->name('starindex')->middleware('Login'); ;  //注册
 Route::get('courseLise','Home\CourseController@courseLise')->name('courseLise');  //列表页面
 Route::get('courseDeatail','Home\CourseController@courseDeatail')->name('courseDeatail');  //列表页面
 Route::get('sucess','Home\CourseController@sucess')->name('sucess');  //列表页面


 Route::get('getCaptcha','Home\LoginController@getCaptcha')->name('getCaptcha');  //验证码
 Route::get('baoming','Home\BaomingController@index')->name('baoming');  //报名页面
 
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

       Route::resource('rush-through','RushThroughController',['only' => ['index', 'create', ' store', 'update', 'edit']]);//闯关列表
       Route::resource('star','StarController',['only' => ['index', 'create', 'store', 'update', 'edit']]);//星球课程
       Route::get('status','StarController@status')->name('star.status');//课程是否启动
       Route::get('childCourse','StarController@childCourse')->name('star.childCourse');//子课程
       Route::get('grade','StarController@grade')->name('star.grade');//年级课程
       Route::get('speech','StarController@speech')->name('star.speech');//词类课程

    
});

