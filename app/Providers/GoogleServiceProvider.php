<?php

namespace App\Providers;

use App\Models\Google;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class GoogleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Fetch Stripe settings from the database
         $googleConfig = Google::first();  //Value coming from the DB
         if ($googleConfig) {
             Config::set('services.google.client_id', $googleConfig->client_id);
             Config::set('services.google.client_secret', $googleConfig->secret_key);
         }
    }
}
