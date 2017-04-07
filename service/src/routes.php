<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
Route::get('service', [
    'as' => 'service',
    'uses' => 'Foostart\Service\Controllers\Front\ServiceFrontController@index'
]);

Route::get('servicer', [
    'as' => 'servicer',
    'uses' => 'Foostart\Service\Controllers\Front\ServiceFrontController@abc'
]);
Route::post('servicer', [
    'as' => 'servicer',
    'uses' => 'Foostart\Service\Controllers\Front\ServiceFrontController@add'
]);

/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see']], function () {

        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////SAMPLES ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        /**
         * list
         */
        Route::get('admin/service', [
            'as' => 'admin_service',
            'uses' => 'Foostart\Service\Controllers\Admin\ServiceAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/service/edit', [
            'as' => 'admin_service.edit',
            'uses' => 'Foostart\Service\Controllers\Admin\ServiceAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/service/edit', [
            'as' => 'admin_service.post',
            'uses' => 'Foostart\Service\Controllers\Admin\ServiceAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/service/delete', [
            'as' => 'admin_service.delete',
            'uses' => 'Foostart\Service\Controllers\Admin\ServiceAdminController@delete'
        ]);
        
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////SAMPLES ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////

        Route::get('service/delete', [
            'as' => 'service.delete',
            'uses' => 'Foostart\Service\Controllers\Front\ServiceFrontController@delete'
        ]);
        
         Route::get('service/edit', [
            'as' => 'service.edit',
            'uses' => 'Foostart\Service\Controllers\Front\ServiceFrontController@edit'
        ]);
         
        Route::post('service/edit', [
            'as' => 'service.post',
            'uses' => 'Foostart\Service\Controllers\Front\ServiceFrontController@post'
        ]);
        

        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        Route::get('admin/service_category', [
            'as' => 'admin_service_category',
            'uses' => 'Foostart\Service\Controllers\Admin\ServiceCategoryAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/service_category/edit', [
            'as' => 'admin_service_category.edit',
            'uses' => 'Foostart\Service\Controllers\Admin\ServiceCategoryAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/service_category/edit', [
            'as' => 'admin_service_category.post',
            'uses' => 'Foostart\Service\Controllers\Admin\ServiceCategoryAdminController@post'
        ]);
        /**
         * delete
         */
        Route::get('admin/service_category/delete', [
            'as' => 'admin_service_category.delete',
            'uses' => 'Foostart\Service\Controllers\Admin\ServiceCategoryAdminController@delete'
        ]);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
    });
});
