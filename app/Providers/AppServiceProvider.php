<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\ServiceProvider;
use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot(Charts $charts)
    {
        $categories = Category::with('children')->whereNull('parent_id')->get(); //children is from category model
        View::share('categories',$categories);

        $charts->register([
            \App\Charts\SampleChart::class,
            // \App\Charts\SalesChart::class
        ]);
        $categories = Category::with('children')->whereNull('parent_id')->get(); //children is from category model
        View::share('categories',$categories);
    }
}
