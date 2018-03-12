<?php

Route::group(['namespace' => 'Web'], function() {

    Route::group(['prefix' => 'application-management'], function() {
        Route::get('update', ['uses' => 'ApplicationManagementController@update']);
    });
});
