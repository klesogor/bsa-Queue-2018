<?php

namespace App\Services;

use App\Entity\Currency;
use App\Jobs\SendRateChangedEmail;
use App\User;

class CurrencyNotificationService implements CurrencyNotificationServiceInterface
{

    public function notifyCurrencyRateChanged( Currency $currency, float $oldRate): void
    {
        User::recivesRateUpdates()->get()->each(function($item) use ($currency, $oldRate) {
            $job = (new SendRateChangedEmail($item,$currency,$oldRate))->onQueue('notification');
            dispatch($job);
        });
    }

    public function notifyCurrencyCreated( Currency $currency): void
    {
        throw new \Exception('Not implemented yet!');
    }
}