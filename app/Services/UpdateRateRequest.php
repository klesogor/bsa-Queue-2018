<?php
namespace App\Services;

class UpdateRateRequest
{
    private $id;
    private $newRate;

    public function __construct(int $id,float $price)
    {
        $this->newRate = $price;
        $this->id = $id;
    }

    public function getId():int
    {
        return $this->id;
    }

    public function getNewRate():int
    {
        return $this->newRate;
    }
}