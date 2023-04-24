<?php

namespace App\Providers;

use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ContentServiceProvider extends ServiceProvider
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
        // view()->composer('layouts.tlayout', function($view){
        //     $tdata = Teacher::all()->where('id', Auth::guard('teacher')->user()->id)->first();
            
        //     $view->with(['tdata' => $tdata]);
        // });
    }
}
