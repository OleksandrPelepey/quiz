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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/quizzes', 'QuizController@index')->name('quizzes');

Route::get('/user/{user}/quizzes', 'QuizController@userQuizzes')->name('user-quizzes');

Route::get('/my-quizzes', 'QuizController@myQuizzes')->name('my-quizzes');

Route::get('/quiz/{quiz}', 'QuizController@quiz')->name('quiz');
