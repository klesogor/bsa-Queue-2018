<?php

namespace App\Events;

use App\Entity\Currency;
use App\Services\CurrencyNotificationServiceInterface;

class CurrencyObserver
{
    //I will just leave it here
    /*public function updated(Currency $currency)
    {
        $oldRate = $currency->getOriginal('rate');
        if($oldRate !== $currency->rate ){
           app(CurrencyNotificationServiceInterface::class)->notifyCurrencyRateChanged($currency,$oldRate);
        }
    }

    
    public function created(Currency $currency)
    {
        app(CurrencyNotificationServiceInterface::class)->notifyCurrencyCreated($currency);
    }
    */
}