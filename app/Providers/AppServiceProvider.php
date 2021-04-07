<?php

namespace App\Providers;

use App\Cart;
use App\Category;
use Illuminate\Support\ServiceProvider;
use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Support\Facades\Auth;
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
            \App\Charts\SalesChart::class,
            \App\Charts\RevenueChart::class,
            \App\Charts\CustomerChart::class,
        ]);
       
        // dd($carts);
       

        view()->composer('*',function($view){
            if (Auth::check()) {
                $carts = Cart::where( 'user_id', Auth::user()->id)->get();
                $sum = Cart::where( 'user_id', Auth::user()->id)->groupBy('product_id')->count();
                //dd($sum);    
                View::share('carts',$carts);
                View::share('sum',$sum);
            }else {
                $carts = session()->get('cart');

                if(isset($carts)){
                    View::share('carts',$carts);
                    $sum = 0;
                    foreach ($carts as $cart) {
                        $sum +=1;
                    }

                View::share('sum',$sum);
                }
            }
        });

    }
}
