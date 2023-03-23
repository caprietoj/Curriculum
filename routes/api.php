<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Informacion Personal
    Route::apiResource('informacion-personals', 'InformacionPersonalApiController');

    // Language
    Route::apiResource('languages', 'LanguageApiController');

    // Contenido
    Route::post('contenidos/media', 'ContenidoApiController@storeMedia')->name('contenidos.storeMedia');
    Route::apiResource('contenidos', 'ContenidoApiController');

    // University
    Route::apiResource('universities', 'UniversityApiController');

    // Hability
    Route::post('habilities/media', 'HabilityApiController@storeMedia')->name('habilities.storeMedia');
    Route::apiResource('habilities', 'HabilityApiController');
});
