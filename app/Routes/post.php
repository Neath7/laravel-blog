<?php
Route::prefix('admin')->group(function () {

    Route::name('admin.')->group(function () {

        Route::group(['middleware' => ['auth']],function(){
            Route::get('post', 'PostController@index')->name('post.index');

            Route::get('post/create', 'PostController@create')->name('post.create');

            Route::post('post/store', 'PostController@store')->name('post.store');

            Route::get('post/edit/{id}', 'PostController@edit')->name('post.edit');

            Route::post('post/update/{post}', 'PostController@update')->name('post.update');
        });
    });
});
