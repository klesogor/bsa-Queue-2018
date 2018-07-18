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

    public function updateRate(UpdateRateRequest $request): void
    {
        $currency = Currency::find($request->getId());
        if(is_null($currency)){
            abort(404);
        }
        $oldPrice = $currency->rate;
        $currency->rate = $request->getNewRate();
        $currency->save();
        $this->service->notifyCurrencyRateChanged($currency,$oldPrice);   
    }
}