<?php

namespace App\Providers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
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
        Paginator::useBootstrapFive();

        view()->composer('layouts.layout', function($view){
            $data = Student::all()->where('id', Auth::guard('student')->user()->id)->first();
            // dd($data);
            
            $view->with('data', $data);
        });

        view()->composer('layouts.tlayout', function($view){
            $tdata = Teacher::all()->where('id', Auth::guard('teacher')->user()->id)->first();
            // dd($tdata);
            $view->with('tdata', $tdata);
        });
        // view()->composer('admin.admin_layout', function($view){
        //     $tdata = Teacher::all()->where('id', Auth::guard('teacher')->user()->id)->first();
        //     // dd($tdata);
        //     $view->with('tdata', $tdata);
        // });
    }
}