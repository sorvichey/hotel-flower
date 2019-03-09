<?php

// Front End
Route::get('/',"FrontController@index");
Route::get('/page/{id}', "FrontPageController@index");
Route::get('/post/category/{id}', "FrontController@category");
Route::get('/post/video', "FrontController@video");
Route::get('/post/detail/{id}', "FrontController@detail");
Route::get('/video/detail/{id}', "FrontController@video_detail");
Route::get('/post/{id}', "FrontController@post");
Auth::routes();

/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
// Back End
Route::get('/admin',"HomeController@index");
Route::get('/admin/dashboard',"HomeController@index");

// load file manager

// Post
Route::get('/admin/post', "PostController@index");
Route::get('/admin/post/create', "PostController@create");
Route::get('/admin/post/create', "PostController@create");
Route::post('/admin/post/save', "PostController@save");
Route::get('/admin/post/delete/{id}', "PostController@delete");
Route::get('/admin/post/edit/{id}', "PostController@edit");
Route::post('/admin/post/update', "PostController@update");
Route::get('/admin/post/view/{id}', "PostController@view");

// Page
Route::get('/admin/page', "PageController@index");
Route::get('/admin/page/create', "PageController@create");
Route::post('/admin/page/save', "PageController@save");
Route::get('/admin/page/delete/{id}', "PageController@delete");
Route::get('/admin/page/edit/{id}', "PageController@edit");
Route::post('/admin/page/update', "PageController@update");
Route::get('/admin/page/view/{id}', "PageController@view");



// slide show
Route::get('/admin/slide', "SlideController@index");
Route::get('/admin/slide/create', "SlideController@create");
Route::post('/admin/slide/save', "SlideController@save");
Route::get('/admin/slide/edit/{id}', "SlideController@edit");
Route::post('/admin/slide/update', "SlideController@update");
Route::get('/admin/slide/delete/{id}', "SlideController@delete");

// page slide show
Route::post('/admin/page-slide/save', "PageSlideController@save");
Route::get('/admin/page-slide/edit/{id}', "PageSlideController@edit");
Route::post('/admin/page-slide/update', "PageSlideController@update");
Route::get('/admin/page-slide/delete/{id}', "PageSlideController@delete");

// page slide show
Route::post('/admin/gallery/save', "GalleryController@save");
Route::get('/admin/gallery/edit/{id}', "GalleryController@edit");
Route::post('/admin/gallery/update', "GalleryController@update");
Route::get('/admin/gallery/delete/{id}', "GalleryController@delete");

// user route
Route::get('/user', "UserController@index");
Route::get('/user/profile', "UserController@load_profile");
Route::get('/user/reset-password', "UserController@reset_password");
Route::post('/user/change-password', "UserController@change_password");
Route::get('/user/finish', "UserController@finish_page");
Route::post('/user/update-profile', "UserController@update_profile");
Route::get('/user/delete/{id}', "UserController@delete");
Route::get('/user/create', "UserController@create");
Route::post('/user/save', "UserController@save");
Route::get('/user/edit/{id}', "UserController@edit");
Route::post('/user/update', "UserController@update");
Route::get('/user/update-password/{id}', "UserController@load_password");
Route::post('/user/save-password', "UserController@update_password");

// role
Route::get('/role', "RoleController@index");
Route::get('/role/create', "RoleController@create");
Route::post('/role/save', "RoleController@save");
Route::get('/role/delete/{id}', "RoleController@delete");
Route::get('/role/edit/{id}', "RoleController@edit");
Route::post('/role/update', "RoleController@update");
Route::get('/role/permission/{id}', "PermissionController@index");
Route::post('/rolepermission/save', "PermissionController@save");

Route::get('/home', 'HomeController@index')->name('home');

// Video
Route::get('/admin/video', "VideoController@index");
Route::get('/admin/video/create', "VideoController@create");
Route::post('/admin/video/save', "VideoController@save");
Route::get('/admin/video/edit/{id}', "VideoController@edit");
Route::get('/admin/video/detail/{id}', "VideoController@detail");
Route::post('/admin/video/update', "VideoController@update");
Route::get('/admin/video/delete/{id}', "VideoController@delete");

// social
Route::get('/admin/social', "SocialController@index");
Route::get('/admin/social/create', "SocialController@create");
Route::get('/admin/social/edit/{id}', "SocialController@edit");
Route::get('/admin/social/delete/{id}', "SocialController@delete");
Route::post('/admin/social/save', "SocialController@save");
Route::post('/admin/social/update', "SocialController@update");