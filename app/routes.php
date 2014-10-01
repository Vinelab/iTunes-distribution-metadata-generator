<?php

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

Route::get('{type}', array('as' => 'select', 'uses' => 'HomeController@select'));

Route::any('generate', array('as' => 'generate', 'uses' => 'HomeController@submit'));
