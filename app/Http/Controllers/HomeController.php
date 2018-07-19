<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCurrencyRateRequest;
use App\Services\CurrencyRepositoryInterface;
use App\Services\CurrencyServiceInterface;
use App\Services\UpdateRateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    private $currencyRepositroy;
    private $service;

    public function __construct(CurrencyRepositoryInterface $repository, CurrencyServiceInterface $service)
    {
        $this->currencyRepositroy = $repository;
        $this->service = $service;
    }

    public function updateRate(int $id,UpdateCurrencyRateRequest $request)
    {
        $currency = $this->currencyRepositroy->getById($id);
        if(Gate::denies('currency.update',$currency)){
            abort(403);
        }
        $this->service->updateRate(new UpdateRateRequest($id,$request->rate));
    }
}
