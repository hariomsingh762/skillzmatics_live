<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Models\MenuItem;
use App\Models\Setting;
use App\Models\Admins;

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
    
        $menu = MenuItem::whereNull('parent_id')->orderBy('order','asc')->take(8)->get();
        View::share('menu', $menu);
        $check = View::composer('*', function ($view) {
            $view->with('admin_login', session('ADMIN_LOGIN1'));
        });
        
        $session = Session::get('ADMIN_LOGIN');
        //dd($session);

        $setting = Setting::where('id', 1)->first();
        //$setting = Setting::first();
        View::share('setting', $setting);


    }
}
