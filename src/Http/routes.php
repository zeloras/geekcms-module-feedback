<?php

Route::group(['middleware' => ['web', 'permission:' . Gcms::MAIN_ADMIN_PERMISSION], 'prefix' => getAdminPrefix('feedback')], function () {
    Route::group(['middleware' => ['permission:modules_feedback_admin_list']], function () {
        Route::get(DIRECTORY_SEPARATOR, 'GeekCms\Feedback\Http\Controllers\AdminController@index')
            ->name('admin.feedback');

        Route::get('/view/{message}', 'GeekCms\Feedback\Http\Controllers\AdminController@view')
            ->name('admin.feedback.view');
    });

    Route::group(['middleware' => ['permission:modules_feedback_admin_remove']], function () {
        Route::get('/delete/{message}', 'GeekCms\Feedback\Http\Controllers\AdminController@delete')
            ->name('admin.feedback.delete');

        Route::get('/delete-all', 'GeekCms\Feedback\Http\Controllers\AdminController@deleteAll')
            ->name('admin.feedback.delete.all');
    });

    Route::group(['middleware' => ['permission:modules_feedback_admin_edit']], function () {
        Route::post('/save', 'GeekCms\Feedback\Http\Controllers\AdminController@save')
            ->name('admin.feedback.save');
    });
});

Route::any('/api/feedback/request', 'GeekCms\Feedback\Http\Controllers\RequestController@request')
    ->name('feedback.request');
