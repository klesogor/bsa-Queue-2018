<?php

namespace App\Services;


use App\Entity\Currency;
use App\User;

interface CurrencyNotificationServiceInterface
{
    public function notifyCurrencyRateChanged(Currency $currency, float $oldRate, User $user):void;

    public function notifyCurrencyCreated(Currency $currency,User $user):void;

    //any other notifications we might need...
}