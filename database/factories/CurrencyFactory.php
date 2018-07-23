<?php

use Faker\Generator as Faker;

$factory->define(App\Entity\Currency::class, function (Faker $faker) {
    return [
        'name' => $faker->domainName,
        'rate' => $faker->numberBetween(0,1000)
    ];
});
