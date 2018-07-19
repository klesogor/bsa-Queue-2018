<?php
namespace App\Services;

use App\Entity\Currency;

class CurrencyRepository implements CurrencyRepositoryInterface
{
    private $service;

    public function __construct(CurrencyNotificationServiceInterface $service)
    {
        $this->service = $service;
    }

    public function getById(int $id): Currency
    {
        return Currency::find($id);
    }

    public function save(Currency $currency): Currency
    {
        $currency->save();
        return $currency;
    }
}