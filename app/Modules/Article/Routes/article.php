<?php

Route::group(['middleware' => ['web']], function () {
    Route::resource('articles', 'App\Modules\Article\Http\Controllers\ArticleController')->except(['show']);
});
