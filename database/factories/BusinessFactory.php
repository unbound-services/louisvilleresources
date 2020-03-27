<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Business;
use Faker\Generator as Faker;

$factory->define(Business::class, function (Faker $faker) {
    return [
      "name" => $faker->word,
      "description" => $faker->paragraph,
      "street_address" => $faker->address,
      "phone" => $faker->phoneNumber,
      "email" => $faker->email,
      "hours" => 'mon-thu: '.$faker->time('g:i:s'),
      "website" => '#',
      "notes" => $faker->sentence,
      "last_confirmed" => $faker->date,
      "zipcode" => $faker->postcode,
      "latitude" => $faker->latitude,
      "longitude" => $faker->longitude,
    ];
});
