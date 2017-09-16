<?php

Route::get('/', 'frontPage@index');
Route::get('sms', 'testController@sms');

Route::get('/front', function(){
	return view('front');
});
//admin
Route::get('admin', 'admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'admin\LoginController@login');
Route::post('admin/logout', 'admin\LoginController@logout')->name('admin.logout');
//common login
route::get('/dashboard', 'admin\commonController@index')->name('admin.dashboard');
//webmasterlogin
Route::get('admin/webmaster', 'admin\webmasterController@index')->name('admin.webmaster');
Route::get('admin/editor', 'admin\editorController@index')->name('admin.editor');
Auth::routes();
//add users
Route::get('/admin/new-user', 'admin\userManager@index')->name('add.user');
Route::get('/admin/users', 'admin\userManager@show')->name('admin.users');
Route::post('/admin/new-user', 'admin\userManager@register')->name('admin.register');
//products
Route::resource('/product', 'admin\productController');
route::post('product/update', 'admin\productController@quickUpdate');
route::post('product/delete', 'admin\productController@quickDelete');
route::post('/product/more-image', 'admin\productController@Mimage');
route::post('/products/{id}', 'admin\productController@updates');
route::post('/products/image/{id}', 'admin\productController@image');
route::post('/delete', 'admin\productController@delete');

//categories and man
Route::post('/admin/category', 'admin\productController@newCat')->name('category');
Route::post('/admin/man', 'admin\productController@newMan')->name('man');

Route::get('/home', 'HomeController@index')->name('home');

//front page routes
route::get('view/{dash}/{cd}', 'frontPageInfo@product');
//cart
Route::get('cart/{id}/add', 'cartController@add');
Route::get('cart', 'cartController@index')->name('cart.view');
route::post('cartUpdate/{id}', 'cartController@update');
route::get('cartDelete/{id}', 'cartController@destroy');
//order
Route::resource('order', 'orderController');
//orderLogin
route::post('/newLogin', 'order\orderLogin@login')->name('order.login');
//orderRegister
Route::get('/newRgister', 'order\orderRegister@showForm')->name('order.register');
Route::post('/new/register', 'order\orderRegister@register')->name('order.registered');
//usersDashboard
route::get('user/orders', 'Auth\userController@index')->name('user.orders');
route::get('orders/view/{id}', 'Auth\userController@show')->name('view.order');
//admin order
route::get('orders/{type}', 'admin\adminOrderController@Rec')->name('new.orders');
Route::get('order/{orderId}/{type}', 'admin\adminOrderController@view');
Route::get('send/{orderId}/{status}', 'admin\adminOrderController@status');
Route::post('send/payment', 'admin\adminOrderController@pay');
//location
Route::get('/locations', 'admin\adminOrderController@location')->name('loc');
route::post('add/location', 'admin\adminOrderController@add')->name('add.loc');
//pages
route::get('/{name}/{id}', 'pagesController@index');

