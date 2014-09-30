<?php

Route::get('/', 'HomeController@index');

Route::get('select/{type}', array('as' => 'select', 'uses' => 'HomeController@select'));

Route::any('generate', array('as' => 'generate', 'uses' => 'HomeController@submit'));
