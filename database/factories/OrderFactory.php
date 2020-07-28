<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'firstname'  	=> $faker->firstName(),
		'lastname'   	=> $faker->lastName(),
        'user_id'    	=> $faker->numberBetween(3,5),
        'company'   	=> $faker->company,
        'country_id' 	=> $faker->randomElement(['Srbija','BIH', 'Makedonija']), 
        'address'    	=> $faker->randomElement(['Prvomajska','Karadjordjeva', 'Makedonska']) . ' ' .$faker->numberBetween(1,100),
        'apartment' 	=> 'Stan' . ' ' .$faker->numberBetween(1,50),
        'delivery_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'delivery_time' => $faker->randomElement(['09:00','15:00', '20:00']),
        'city'      	=> 'Beograd',
        'postal_code'   => '11000',
        'phone'         => '011' . ' ' . $faker->numberBetween(123456789,567891234),
        'email'      	=> $faker->safeEmail,
        'content'      	=> $faker->text
    ];
});
