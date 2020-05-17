<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', 'Auth\RegisterUserController@store');
Route::post('/verify', 'Auth\RegisterUserController@verify');

Route::get('/lesson/{slug}', 'Courses\LessonController@index');

Route::get('/courses/{slug}', 'Courses\CourseController@index');
Route::get('/course/all', 'Courses\CourseController@all');


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::post('/course/new', 'Courses\CourseController@store');
});
