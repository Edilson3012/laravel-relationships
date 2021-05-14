<?php

/**
 * One To One
 */

use Illuminate\Support\Facades\Route; 

Route::get('one-to-one','OneToOneController@oneToOne');
Route::get('one-to-one-inverse','OneToOneController@oneToOneInverse');
Route::get('one-to-one-insert','OneToOneController@oneToOneInsert');


/**
 * One To Many
 */
Route::get('one-to-many', 'OneToManyController@oneToMany');
Route::get('many-to-one', 'OneToManyController@manyToOne');

Route::get('/', function () {
    return view('welcome');
});


