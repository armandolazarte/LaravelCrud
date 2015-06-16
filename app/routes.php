<?php

Route::get('/', [
    'as'   => 'inicio',
    'uses' => 'InicioController@index',
]);

Route::resource('usuario', 'UsersController');
Route::resource('usuario-ajax', 'UsersAjaxController');
