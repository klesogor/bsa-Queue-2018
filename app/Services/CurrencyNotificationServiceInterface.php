<?php

namespace App\Services;


use App\Entity\Currency;
use App\User;

interface CurrencyNotificationServiceInterface
{
    public function notifyCurrencyRateChanged(Currency $currency, float $oldRate):void;

    public function notifyCurrencyCreated(Currency $currency):void;

    //any other notifications we might need...
}