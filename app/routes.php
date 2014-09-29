<?php

Route::get('/', 'HomeController@index');

Route::get('generate', array('as' => 'generate', 'uses' => 'HomeController@submit'));
