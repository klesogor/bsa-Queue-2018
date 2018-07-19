<?php

namespace App\Services;


use App\Entity\Currency;

class CurrencyService implements  CurrencyServiceInterface
{
    private $currencyRepository;
    private $notificationService;
    private $userRepository;

    public function __construct(
        CurrencyRepositoryInterface $repository,
        CurrencyNotificationServiceInterface $service,
        UserRepositoryInterface $userRepository)
    {
        $this->currencyRepository = $repository;
        $this->notificationService = $service;
        $this->userRepository = $userRepository;
    }

    public function updateRate(UpdateRateRequest $request): Currency
    {
        $currency = $this->currencyRepository->getById($request->getId());
        $oldRate = $currency->rate;
        $currency->rate = $request->getNewRate();
        $currency = $this->currencyRepository->save($currency);
        $this->userRepository->getUsersToNotifyCurrencyUpdate()->each(function($user) use ($currency, $oldRate){
            $this->notificationService->notifyCurrencyRateChanged($currency,$oldRate,$user);
        });
        return $currency;
    }
}