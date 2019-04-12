<?php

Route::group(['middleware' => ['web']], function () {
    Route::get(
        \Config::get('laravel_meli_sdk.redirect_url'),
        'Tecnogo\LaravelMeliSdk\Http\MeliSdkController@handleMercadolibreAuthResponse'
    );
});
