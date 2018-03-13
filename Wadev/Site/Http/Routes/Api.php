<?php
Route::group(['namespace' => 'Api'], function(){
    Route::get('/', ['uses' => 'HomeController@getIndex']);
    
});