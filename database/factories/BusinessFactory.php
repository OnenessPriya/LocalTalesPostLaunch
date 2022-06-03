<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Business;
use Faker\Generator as Faker;
use App\Models\PinCode;

$factory->define(Business::class, function (Faker $faker) {
    $address = $faker->address;
    $pin = array_reverse(explode(" ", $address))[0];
    return [
        'business_name' => $faker->company,
        'email' => $faker->unique()->safeEmail,
        'mobile' => $faker->phoneNumber,
        // 'pin' => PinCode::select('pin')->inRandomOrder()->limit(2)->first(),
        // 'pin' => $faker->numerify('####'),
        'address' => $address,
        'pin' => $pin,
        // 'country' => $faker->country,
        // 'city' => $faker->city,
    ];
});
