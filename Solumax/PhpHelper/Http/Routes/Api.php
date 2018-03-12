<?php

Route::group(['prefix' => 'api', 'namespace' => 'Api'], function() {

    Route::group(['prefix' => 'qr-code-generator'], function() {
        Route::get('png/{string}', ['uses' => 'QrCodeGenerator@png']);
    });

    Route::group(['prefix' => 'barcode-generator'], function() {
        Route::get('png/{string}', ['uses' => 'BarcodeGenerator@png']);
    });

    Route::group(['prefix' => 'angular-management'], function() {
        Route::get('reset', ['uses' => 'AngularManagementController@reset']);
        Route::get('retrieve', ['uses' => 'AngularManagementController@retrieve']);
    });
});
