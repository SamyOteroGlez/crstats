<?php

namespace App\Providers;

use URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->myHelpers();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(env('APP_ENV') !== 'local') { 
		URL::forceScheme('https');
	 }
    }

    protected function myHelpers()
    {
        $file = app_path('Helpers/my_helpers.php');

        if (file_exists($file)) {
            require_once($file);
        }
    }
}
