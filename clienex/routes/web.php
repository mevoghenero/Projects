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

Route::get('/', 'InventoryController@root')->name('root');

Route::get('inventory/{id}', 'InventoryController@index')->name('inventory.index');
Route::get('cart/{id}', 'InventoryController@cart')->name('inventory.cart');

// Manage Product Category
Route::get('product/{id}/category', 'CategoryController@index')->name('cat.index');
Route::post('category/store', 'CategoryController@store')->name('cat.store');
Route::put('update/category/{id}', 'CategoryController@update')->name('cat.update');
Route::delete('delete/category/{id}', 'CategoryController@delete')->name('cat.delete');

// Manage Product types
Route::get('product/{id}/types', 'ProductTypeController@index')->name('type.index');
Route::post('store/type', 'ProductTypeController@store')->name('type.store');
Route::put('update/type/{id}', 'ProductTypeController@update')->name('type.update');
Route::delete('delete/type/{id}', 'ProductTypeController@delete')->name('type.delete');


//Manage Products
Route::get('products/{id}/list', 'ProductController@index')->name('product.index');
Route::post('store/product', 'ProductController@store')->name('product.store');
Route::put('update/product/{id}', 'ProductController@update')->name('product.update');
Route::delete('delete/product/{id}', 'ProductController@delete')->name('product.delete');

// Organization Users
Route::get('employee', 'UserController@index')->name('user.index');
Route::post('store/employee', 'UserController@store')->name('user.store');
Route::put('update/employee/{id}', 'UserController@update')->name('user.update');
Route::get('employee/status', 'UserController@status')->name('user.status');
Route::put('status/{id}', 'UserController@updateStatus')->name('user.updateStatus');
Route::delete('delete/user/{id}', 'UserController@delete')->name('user.delete');

//Manage Outlet
Route::get('outlets/{id}/list', 'OutletController@index')->name('outlet.index');
Route::get('create-outlet', 'OutletController@create')->name('modal.create');
Route::post('store-outlet', 'OutletController@store')->name('outlet.store');
Route::get('edit-outlet/{id}', 'OutletController@edit')->name('outlet.edit');
Route::put('update/outlet/{id}', 'OutletController@update')->name('outlet.update');
Route::delete('delete/outlet/{id}', 'OutletController@delete')->name('outlet.delete');


//Manage Organisations
Route::get('organisations', 'OrganisationController@index')->name('org.index');
Route::get('organisation/create', 'OrganisationController@create')->name('org.create');
Route::post('organisations/store', 'OrganisationController@store')->name('org.store');
Route::get('organisations/{id}/edit', 'OrganisationController@edit')->name('org.edit');
Route::put('organisations/update/{id}', 'OrganisationController@update')->name('org.update');
Route::delete('organisations/delete/{id}', 'OrganisationController@delete')->name('org.delete');

//Manage Roles
Route::get('roles', 'RoleController@index')->name('role.index');
Route::post('store/role', 'RoleController@store')->name('role.store');
Route::put('update/role/{id}', 'RoleController@update')->name('role.update');
Route::delete('delete/role/{id}', 'RoleController@delete')->name('role.delete');

//Manage Admin
Route::get('admin/list', 'AdminController@index')->name('company.index');
Route::get('add/new/admin', 'AdminController@view')->name('comapny.view');
Route::post('add/admin', 'AdminController@store')->name('company.store');
Route::get('admin/{id}/edit', 'AdminController@edit')->name('company.edit');
Route::put('admin/{id}/update', 'AdminController@update')->name('comapny.update');
Route::delete('admin/delete/{id}', 'AdminController@delete')->name('company.delete');

//Authentication for Login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');



// ProfileUsers for recognition
Route::get('user/profile', 'ProfileController@index')->name('profile.index');
// Route::get('user/view/profile', 'ProfileController@view')->name('profile.view');
// Route::get('user/upload/image', 'ProfileController@uploadFile')->name('profile.upload');
Route::post('user/profile/save', 'ProfileController@store')->name('profile.store');
Route::put('user/profile/update', 'ProfileController@update')->name('profile.edit');
// Route::delete('user/profile/delete', 'ProfileController@delete')->name('profile.delete');



// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// cloudinary for image upload
// Route::get('getfile', 'CloudderController@getFile');
// Route::post('uploadfile', ['as'=>'upload-file','uses'=>'CloudderController@uploadFile']);

