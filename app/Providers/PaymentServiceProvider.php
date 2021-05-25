<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\PaymentMethod;
use App\Util\Payments\PayPalPayment;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * 
     * @return void
     */
    public function register()
    {
        $this->app->bind(PaymentMethod::class, function () {
            return new PayPalPayment();
        });
    }
}