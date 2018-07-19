<?php

namespace App\Services;

use App\Entity\Currency;
use App\Jobs\SendRateChangedEmail;
use App\User;

class CurrencyNotificationService implements CurrencyNotificationServiceInterface
{

    public function notifyCurrencyRateChanged( Currency $currency, float $oldRate, User $user): void
    {
            $job = (new SendRateChangedEmail($user,$currency,$oldRate))->onQueue('notification');
            dispatch($job);
    }

    public function notifyCurrencyCreated( Currency $currency, User $user): void
    {
        throw new \Exception('Not implemented yet!');
    }
}