<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'StaticController@index');
Route::get('/about-us', 'StaticController@about' );

Route::resource('articles', 'ArticlesController');


/*Route::get('/article/{id}/{second_param}', function($id, $second_param){
    return 'ID статьи: '.$id.' Автор: '.$second_param;
});*/

Auth::routes();

Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
