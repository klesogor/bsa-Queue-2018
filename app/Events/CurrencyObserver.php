<?php

namespace App\Events;

use App\Entity\Currency;
use App\Jobs\SendRateChangedEmail;
use App\User;

class CurrencyObserver
{
    public function updated(Currency $currency)
    {
        $oldRate = $currency->getOriginal('rate');
        if($oldRate !== $currency->rate ){
            User::recivesRateUpdates()->get()->each(function($item) use ($currency, $oldRate) {
                $job = (new SendRateChangedEmail($item,$currency,$oldRate))->onQueue('notification');
                dispatch($job);
            });
        }
    }
}