<?php

namespace App\Services;


use App\User;
use Illuminate\Support\Collection;

class UserRepository implements UserRepositoryInterface
{

    public function getUsersToNotifyCurrencyUpdate(): Collection
    {
        return User::recivesRateUpdates()->get();
    }
}