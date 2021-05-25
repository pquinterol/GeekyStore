<?php

namespace App\Interfaces;
use Illuminate\Http\Request;

interface PaymentMethod
{
    public function pay($amount, $currency,  $callBackUrl, $cancelUrl);
}