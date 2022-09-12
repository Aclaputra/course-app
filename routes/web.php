<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
  ->name('home');
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])
  ->name('home.index')
  ->middleware('is_admin');

// C.R.U.D Routes.
Route::resource('admin/home', App\Http\Controllers\StudentCRUDController::class)
  ->middleware('is_admin');
Route::resource('home/course', App\Http\Controllers\CourseCRUDController::class)
  ->middleware('is_student');

Route::get('student_export', [App\Http\Controllers\StudentCRUDController::class, 'get_student_data'])
  ->name('student.export');
