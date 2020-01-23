<?php

namespace App\Article;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

/**
 * Class ArticleServiceProvider responsible for loading article module config and routes and views
 * @package App\Article
 * @author Abeer Elhout<abeer.elhout@gmail.com>
 */
class ArticleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfig();
        $this->registerFactories();
        $this->loadRoutes();
        $this->loadMigration();
        $this->publishViews();
    }

    public function register()
    {
        parent::register();
    }

    /**
     * Load module config
     */
    public function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/Config/article.php' => config_path('article.php')
        ]);
        $this->mergeConfigFrom(__DIR__ . '/Config/article.php', 'article');
    }

    /**
     * Load module views
     */
    public function publishViews()
    {
        $this->loadViewsFrom(__DIR__ . '/Views', 'Article');
    }

    /**
     * Register an additional directory of factories.
     */
    public function registerFactories()
    {
        app(Factory::class)->load(__DIR__ . '/Database/factories');
    }

    /**
     * Load articles routes
     */
    public function loadRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . '/Routes/article.php');
    }

    /**
     * Load module migration to create database
     */
    public function loadMigration()
    {
        $this->publishes([
            __DIR__ . '/Database/migrations/' => database_path('migrations')
        ]);
        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');
    }
}
