<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\PinCode;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'business_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'mobile' => $faker->phoneNumber,
        // 'pin' => PinCode::select('pin')->limit(2)->first(),
       // 'pin' => PinCode::where('pin',2170)->orderByRandom->limit(10)->get(),
       'pin' => factory(App\Models\PinCode::class),
        'country' => $faker->country,
        'city' => $faker->city,
        'address' => $faker->address,
    ];
});

