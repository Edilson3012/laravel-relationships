<?php

/**
 * One To One
 */

use Illuminate\Support\Facades\Route; 

Route::get('one-to-one','OneToOneController@oneToOne');
Route::get('one-to-one-inverse','OneToOneController@oneToOneInverse');


Route::get('/', function () {
    return view('welcome');
});


