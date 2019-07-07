<?php

Route::group(['middleware' => ['web', 'permission:admin_access'], 'prefix' => getAdminPrefix('feedback')], function () {
    Route::group(['middleware' => ['permission:modules_feedback_admin_list']], function () {
        Route::get('/', 'GeekCms\Feedback\Http\Controllers\AdminController@index')
            ->name('admin.feedback')
        ;
    });
});

Route::any('/api/feedback/request', 'GeekCms\Feedback\Http\Controllers\RequestController@request')
    ->name('feedback.request')
;
