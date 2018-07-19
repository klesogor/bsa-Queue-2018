<?php

namespace App\Services;


use App\Entity\Currency;

interface CurrencyServiceInterface
{
    public function updateRate(UpdateRateRequest $request): Currency;
}