<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register():void
    {
        $this->app->bind(QueryBuilder::class, CategotiesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, NewsQueryBuilder::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot():void
    {
        Paginator::useBootstrapFour();
        //Paginator::defaultView('news.index');
        //Paginator::defaultSimpleView('news.index');
    }
}
