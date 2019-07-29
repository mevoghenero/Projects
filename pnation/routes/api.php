<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// ENDPOINT FOR LOGIN AUTHENTICATION
Route::post('v1/student/login', 'StudentController@login');
Route::post('v1/admin/login', 'AdminController@login');

// Only display information of the login user
Route::group(['middleware' => ['jwt.verify']], function() {
	Route::get('v1/student/auth', 'StudentController@getAuthUser');
	Route::get('v1/admin/auth', 'AdminController@getAuthUser');
});


// ENDPOINT FOR STUDENTS
Route::get('v1/students/all', 'StudentController@index');
Route::get('v1/student/get/{id}', 'StudentController@getById');
Route::post('v1/student/register', 'StudentController@store');
Route::get('v1/student/show/{id}', 'StudentController@show');
Route::put('v1/student/update/{id}', 'StudentController@update');
Route::delete('v1/student/logout/{id}', 'StudentController@delete');


// ENDPOINT FOR CATEGORY
Route::get('v1/categories/all', 'CategoryController@getAll');
Route::get('v1/category/get/{slug}', 'CategoryController@getById');
Route::post('v1/category/post', 'CategoryController@createCat');
Route::put('v1/category/put/{id}', 'CategoryController@updateCat');
Route::delete('v1/category/delete/{id}', 'CategoryController@deleteById');

// ENDPOINT FOR SUBJECTS
Route::get('v1/subjects/all', 'SubjectController@getAll');
Route::get('v1/subject/get/{slug}', 'SubjectController@getById');
Route::post('v1/subject/post', 'SubjectController@createSubject');
Route::put('v1/subject/put/{id}', 'SubjectController@updateSubject');
Route::delete('v1/subject/delete/{id}', 'SubjectController@deleteById');

// ENDPOINT FOR ADMIN
Route::get('v1/admin/all', 'AdminController@getAll');
Route::get('v1/admin/get/{id}', 'AdminController@getById');
Route::post('v1/admin/post', 'AdminController@createAdmin');
Route::put('v1/admin/put/{id}', 'AdminController@updateAdmin');
Route::delete('v1/admin/delete/{id}', 'AdminController@deleteAdmin');

// ENDPOINT FOR TUTORS TO APPLY
Route::post('v1/tutor/post', 'TutorController@tutorCreate');

