<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



Auth::routes();

Route::get('/','TaskAndFollowUp\TaskController@index')->name("tasks");
//Route::get('/', 'Dashboard\DashboardController@index')->name("dashboard");
Route::get('/home', 'TaskAndFollowUp\TaskController@index')->name("tasks");
Route::get('/dash', 'Dashboard\DashboardController@index')->name("home");
Route::get('/projects', 'Projects\ProjectsController@index')->name("projects");
Route::get('/myprojects','MyProjects\MyProjectsController@index')->name("myprojects");
Route::get('/issues','Issues\IssuesController@index')->name("issues");
Route::get('/userboards','UserBoards\UserBoardsController@index')->name("userboards");
Route::get('/tasks','TaskAndFollowUp\TaskController@index')->name("tasks");
Route::post('/createtasks','TaskAndFollowUp\TaskController@store')->name("tasks");
Route::get('tasks/{id}', ['uses' =>'TaskAndFollowUp\TaskController@show'])->where('id', '[0-9]+')->name("tasks");
Route::delete('deletetasks/{id}', ['uses' =>'TaskAndFollowUp\TaskController@destroy'])->where('id', '[0-9]+')->name("tasks");


Route::get('/taskfollowupuserboards','TaskAndFollowUp\TaskFollowUpUserBoardsController@index')->name("taskfollowupuserboards");
