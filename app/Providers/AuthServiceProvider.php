<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */

     public function boot()
    {
        // Define custom guard for 'customer'
        Auth::viaRequest('customer', function ($request) {
            return $request->user('customer');
        });

        // Define custom guard for 'admin'
        Auth::viaRequest('admin', function ($request) {
            return $request->user('admin');
        });
    }

   
}
