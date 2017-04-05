<?php

Route::resource('maritalstatuses',
    \Myrtle\Core\MaritalStatuses\Http\Controllers\Administrator\MaritalStatusController::class, ['except' => ['show']]);

Route::group(['prefix' => 'docks/maritalstatuses', 'as' => 'docks.maritalstatuses.'], function () {
    Route::get('seed', [
        'uses' => \Myrtle\Core\MaritalStatuses\Http\Controllers\Administrator\MaritalStatusesSeedController::class . '@create',
        'as' => 'seed.create'
    ]);
    Route::post('seed', [
        'uses' => \Myrtle\Core\MaritalStatuses\Http\Controllers\Administrator\MaritalStatusesSeedController::class . '@store',
        'as' => 'seed.store'
    ]);
});