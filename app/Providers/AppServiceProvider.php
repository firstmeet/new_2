<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
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
		$sql="SELECT
			UPDATE_TIME
		FROM
			information_schema.TABLES
		WHERE
			information_schema.TABLES.TABLE_SCHEMA = 'chshop' and information_schema.TABLES.TABLE_NAME = 'sen_translate';";
		$rs=\DB::select($sql);

		View::share('VS', strtotime($rs[0]->UPDATE_TIME));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        dd($_SESSION);
//        \DB::listen(function ($sql) {
//           dd($sql);
//        });
    }
}
