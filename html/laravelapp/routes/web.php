<?php

use App\Models\ClazzCourse;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'CourseController@index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
  return view('dashboard');
})->name('dashboard');

// 本番 start
/*
=========================================================================================
|  Route::resource('tests', 'TestController');                                          |
=========================================================================================
| GET       | /tests             | index   | リソースを一覧表示する                       |
| GET       | /tests/create      | create  | リソースを新規作成するためのフォームを表示する |
| POST      | /tests             | store   | リソースを新規作成する                       |
| GET       | /tests/{test}      | show    | 指定されたリソースの詳細情報を表示する        |
| GET       | /tests/{test}/edit | edit    | 指定されたリソースの編集フォームを表示する     |
| PUT/PATCH | /tests/{test}      | update  | 指定されたリソースを更新する                  |
| DELETE    | /tests/{test}      | destroy | 指定されたリソースを削除する                  |
=========================================================================================
*/
Route::resource('courses', 'CourseController');
Route::resource('clazz_course', 'ClazzCourseController', ['only' => ['store', 'destroy']]);
// 本番 end

Route::get('test', 'TestController@index');
Route::get('test/arrow', fn () => "こんにちは!");
Route::get('test/relation', 'TestController@relation');

Route::get('sample1', function () {
  return view('sample1');
});

Route::get('test', function () {
  $clazz_id = 120;
  $course_id = 17;
  $m = ClazzCourse::where('clazz_id', $clazz_id)
    ->where('course_id', $course_id)
    ->first();
  dd($m);
});
