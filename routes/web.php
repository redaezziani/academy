<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/HomePage');
});

Route::get('/HomePage', [App\Http\Controllers\Controller::class, 'welcome'])->name('HomePage');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/RecordCourses', [App\Http\Controllers\Controller::class, 'RecordCourses'])->name('RecordCourses');

Route::get('/LiveCourses', [App\Http\Controllers\Controller::class, 'LiveCourses'])->name('LiveCourses');

Route::get('/LiveCourses/Course', [App\Http\Controllers\Controller::class, 'LiveCourseWatche'])->name('LiveCourseWatche');


