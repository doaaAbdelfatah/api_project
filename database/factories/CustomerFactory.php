<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;

use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    $name =$faker->name;
    return [
        'name' =>$name  ,
        'certificate_name' => $name ,
        'email' => $faker->unique()->safeEmail,
        'mobile' => $faker->phoneNumber,
        'type' => $faker->randomElement([1,2]),
        'created_by' => rand(1,10)
    ];
});
