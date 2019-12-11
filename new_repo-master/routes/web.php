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



Route::get('/', function () {
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('Permission','PermissionController');
Route::resource('Role','RoleController');
Route::resource('User','UserController');
Route::resource('CourseDetail','CourceDetailController');
Route::resource('StudentCourse','StudentCourceDetailController');
Route::resource('StudentExams','StudentExamAttemptController');
Route::resource('StudentProgress','StudentProgressController');
Route::get('Progress','StudentProgressController@check_progress');
Route::get('Student-Progress','StudentProgressController@check_progress1');
Route::get('Progress-Selection',function(){
    return view('pages.ProgressSelection');
});
Route::post('StudentRecord','StudentRecordController@Check_Record');

Route::get('search-course','StudentRecordController@search_course');