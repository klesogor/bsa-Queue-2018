<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 19.07.2018
 * Time: 7:41
 */

namespace App\Services;


use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function getUsersToNotifyCurrencyUpdate():Collection;
}