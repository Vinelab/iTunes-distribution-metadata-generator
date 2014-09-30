<?php

Route::get('/', 'HomeController@index');

Route::any('generate', array('as' => 'generate', 'uses' => 'HomeController@submit'));
