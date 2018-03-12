<?php

Route::group(['prefix' => 'php-helper', 'namespace' => 'Solumax\PhpHelper\Http\Controllers'], function() {

    include('Routes/Api.php');
    include('Routes/Web.php');
});
