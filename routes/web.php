<?php

Route::redirect('/admin', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Informacion Personal
    Route::delete('informacion-personals/destroy', 'InformacionPersonalController@massDestroy')->name('informacion-personals.massDestroy');
    Route::resource('informacion-personals', 'InformacionPersonalController');

    // Language
    Route::delete('languages/destroy', 'LanguageController@massDestroy')->name('languages.massDestroy');
    Route::resource('languages', 'LanguageController');

    // Contenido
    Route::delete('contenidos/destroy', 'ContenidoController@massDestroy')->name('contenidos.massDestroy');
    Route::post('contenidos/media', 'ContenidoController@storeMedia')->name('contenidos.storeMedia');
    Route::post('contenidos/ckmedia', 'ContenidoController@storeCKEditorImages')->name('contenidos.storeCKEditorImages');
    Route::resource('contenidos', 'ContenidoController');

    // Experience
    Route::delete('experiences/destroy', 'ExperienceController@massDestroy')->name('experiences.massDestroy');
    Route::post('experiences/media', 'ExperienceController@storeMedia')->name('experiences.storeMedia');
    Route::post('experiences/ckmedia', 'ExperienceController@storeCKEditorImages')->name('experiences.storeCKEditorImages');
    Route::resource('experiences', 'ExperienceController');

    // University
    Route::delete('universities/destroy', 'UniversityController@massDestroy')->name('universities.massDestroy');
    Route::resource('universities', 'UniversityController');

    // Hability
    Route::delete('habilities/destroy', 'HabilityController@massDestroy')->name('habilities.massDestroy');
    Route::post('habilities/media', 'HabilityController@storeMedia')->name('habilities.storeMedia');
    Route::post('habilities/ckmedia', 'HabilityController@storeCKEditorImages')->name('habilities.storeCKEditorImages');
    Route::resource('habilities', 'HabilityController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

Route::get('/', 'VistaController@index');