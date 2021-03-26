<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;

class AuthServiceProvider extends ServiceProvider
{

    public function boot()
    {
        View::composer('*', function($view)
        {
            $view->with('user', Auth::user());
        });
    }

}
