<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Support\Facades\View::composer('public.layouts.app', function ($view) {
            $today = now()->format('Y-m-d');
            $visitor = \App\Models\Visitor::firstOrCreate(['date' => $today], ['hits' => 0]);
            
            if (!\Illuminate\Support\Facades\Session::has('visited_' . $today)) {
                $visitor->increment('hits');
                \Illuminate\Support\Facades\Session::put('visited_' . $today, true);
            }
            
            $view->with('visitor_today', $visitor->hits);
        });
    }
}
