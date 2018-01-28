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
    return view('main');
});


Route::get('/notes', function () {  
    return view('welcome');
});

//show notes
Route::get('/notes/show', ['uses'=>'NotesController@show', 'as'=>'show_notes']);


//add note
Route::match(['get', 'post'], '/notes/add', ['uses'=>'NotesController@add', 'as'=>'add_note']);


//delete note	
Route::match(['get', 'post'], '/notes/delete', ['uses'=>'NotesController@delete_with_post', 'as'=>'delete_note_with_post']);
Route::match(['get', 'post'], '/notes/{note_delete}/delete', ['uses'=>'NotesController@delete', 'as'=>'delete_note']);


//edit note GET
Route::get('/notes/{update_note}/update', ['uses'=>'NotesController@update_get', 'as'=>'get_update_note']);
//edit note POST
Route::post('/notes/{update_note}/update', ['uses'=>'NotesController@update_post', 'as'=>'post_update_note']);


//authorization
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
//Route::get('/login', 'Auth\LoginController@index'); 
//Route::post('/login', 'Auth\LoginController@login');


