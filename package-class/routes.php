<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
Route::get('class', [
    'as' => 'class',
    'uses' => 'Foostart\Class\Controllers\Front\ClassFrontController@index'
]);


/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see', 'in_context'],
                  'namespace' => 'Foostart\Class\Controllers\Admin',
        ], function () {

        /*
          |-----------------------------------------------------------------------
          | Manage class
          |-----------------------------------------------------------------------
          | 1. List of classes
          | 2. Edit class
          | 3. Delete class
          | 4. Add new class
          | 5. Manage configurations
          | 6. Manage languages
          |
        */

        /**
         * list
         */
        Route::get('admin/classes', [
            'as' => 'classes.list',
            'uses' => 'ClassAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/classes/edit', [
            'as' => 'classes.edit',
            'uses' => 'ClassAdminController@edit'
        ]);

        /**
         * copy
         */
        Route::get('admin/classes/copy', [
            'as' => 'classes.copy',
            'uses' => 'ClassAdminController@copy'
        ]);

        /**
         * class
         */
        Route::post('admin/classes/edit', [
            'as' => 'classes.class',
            'uses' => 'ClassAdminController@class'
        ]);

        /**
         * delete
         */
        Route::get('admin/classes/delete', [
            'as' => 'classes.delete',
            'uses' => 'ClassAdminController@delete'
        ]);

        /**
         * trash
         */
         Route::get('admin/classes/trash', [
            'as' => 'classes.trash',
            'uses' => 'ClassAdminController@trash'
        ]);

        /**
         * configs
        */
        Route::get('admin/classes/config', [
            'as' => 'classes.config',
            'uses' => 'ClassAdminController@config'
        ]);

        Route::post('admin/classes/config', [
            'as' => 'classes.config',
            'uses' => 'ClassAdminController@config'
        ]);

        /**
         * language
        */
        Route::get('admin/classes/lang', [
            'as' => 'classes.lang',
            'uses' => 'ClassAdminController@lang'
        ]);

        Route::post('admin/classes/lang', [
            'as' => 'classes.lang',
            'uses' => 'ClassAdminController@lang'
        ]);

    });
});
