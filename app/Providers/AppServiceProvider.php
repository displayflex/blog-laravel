<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{

	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		// $this->app->bind('CounterBind', function() {
		// 	return new \App\Implementations\Counter();
		// });

		// $this->app->singleton('CounterSingleton', function() {
		// 	return new \App\Implementations\Counter();
		// });

		if (App::isLocal()) {
			$this->app->bind(
				'App\Interfaces\CounterInterface',
				'App\Implementations\Counter'
			);
		} else {
			$this->app->bind(
				'App\Interfaces\CounterInterface',
				'App\Implementations\Counter2'
			);
		}

	}
}
