<?php
Route::group(['namespace' => 'Site'], function(){
    Route::get('/', ['uses' => 'HomeController@getIndex']);
    
});
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

