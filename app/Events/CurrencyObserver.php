<?php

namespace App\Events;

use App\Entity\Currency;
use App\Services\CurrencyNotificationServiceInterface;

class CurrencyObserver
{
    public function updated(Currency $currency)
    {
        $oldRate = $currency->getOriginal('rate');
        if($oldRate !== $currency->rate ){
           app(CurrencyNotificationServiceInterface::class)->notifyCurrencyRateChanged($currency,$oldRate);
        }
    }

    //I planned to implement this, however I don't have enough time :(
    /*public function created(Currency $currency)
    {
        app(CurrencyNotificationServiceInterface::class)->notifyCurrencyCreated($currency);
    }
    */
}