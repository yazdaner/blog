<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Category::with('children')->where('parent_id',0)->get();
        View::composer('home.sections.header', function ($view) use ($categories) {
            $view->with('categories',$categories);
        });
    }
}
