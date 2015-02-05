<?php namespace Radiula\Title;

use Illuminate\Support\ServiceProvider;

class TitleServiceProvider extends ServiceProvider {

    /**
     * {@inheritDoc}
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/config.php' => config_path('title.php'),
        ]);

        $this->mergeConfigFrom(__DIR__ . '/config/config.php', 'title');
    }

    /**
     * {@inheritDoc}
     */
    public function register()
    {
        $this->bindRepositories();
    }

    /**
     * Bind Repositories
     *
     * @return void
     */
    protected function bindRepositories()
    {
        $this->app->bind('Title', function ($app)
        {
            return new Models\Title($app['config']);
        });
    }

    /**
     * {@inheritDoc}
     */
    public function provides()
    {
        return [
            'radiula.title',
            'radiula.siteName',
            'radiula.make',
        ];
    }

}
