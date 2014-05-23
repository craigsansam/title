<?php namespace Radiula\Title;

use Illuminate\Support\ServiceProvider;

class TitleServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->package('radiula/title');
		$this->bindRepositories();
	}

	/**
	 * Bind Repositories
	 *
	 * @return void
	 */
	protected function bindRepositories()
	{
			$this->app->bind('Title', function($app)
			{
				return new \Radiula\Title\Models\Title($app['config']);
			});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
