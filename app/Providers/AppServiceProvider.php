<?php

namespace App\Providers;


use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        Blade::directive('set',function ($exp){
           list($name,$val)=explode(',',$exp);

           return "<?php $name=$val; ?>";
        });

        DB::listen(function ($query){
//            echo '<h1>'.$query->sql.'</h1>';
        });
    }
}
