<?php

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

Route::get('/', function () {
  return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
  return view('dashboard');
})->name('dashboard');

// 本番 start
Route::get('courses', 'CourseController@index');
// 本番 end

Route::get('test', 'TestController@index');
Route::get('test/arrow', fn () => "こんにちは!");
Route::get('test/relation', 'TestController@relation');

Route::get('sample1', function () {
  return view('sample1');
});
