<?php

Route::group(['namespace' => 'Davidcb\News\Http\Controllers', 'as' => 'admin.'], function() {
	Route::resource('news', 'NewsController');
});