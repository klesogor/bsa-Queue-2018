<?php
namespace App\Services;

use App\Entity\Currency;

interface CurrencyRepositoryInterface
{
    public function getById(int $id): Currency;

    public function save(Currency $currency): Currency;
}