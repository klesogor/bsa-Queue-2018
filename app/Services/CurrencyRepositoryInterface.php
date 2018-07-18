<?php
namespace App\Services;

use App\Entity\Currency;

interface CurrencyRepositoryInterface
{
    public function getById(int $id): Currency;

    public function updateRate(UpdateRateRequest $request): void;
}