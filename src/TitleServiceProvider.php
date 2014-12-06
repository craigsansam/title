<?php namespace Radiula\Title;

use Illuminate\Support\ServiceProvider;

class TitleServiceProvider extends ServiceProvider {

    /**
     * {@inheritDoc}
     */
    public function boot()
    {
        $this->package('radiula/title', 'radiula/title', __DIR__);
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
            return new \Radiula\Title\Models\Title($app['config']);
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
