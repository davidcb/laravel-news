<?php

namespace Davidcb\News;

use Illuminate\Support\ServiceProvider;

class NewsServiceProvider extends ServiceProvider {

	public function boot()
	{
		$this->loadViewsFrom(__DIR__ . '/resources/views', 'news');
		$this->loadRoutesFrom(__DIR__ . '/routes/web.php');
	}

	public function register()
	{
		//
	}

}