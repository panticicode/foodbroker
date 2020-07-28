<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CartItem;
use Faker\Generator as Faker;

$factory->define(CartItem::class, function (Faker $faker) {
    return [
        'user_id'    => $faker->numberBetween(3,5),
		'is_send' => 0,
        'product_id' => $faker->numberBetween(1,5),
        'name' => $faker->randomElement([
			'Ananas', 'Banane', 'Dinja', 'Grejpfrut', 'Ajdared', 
			'Crveni Delises', 'Greeni Smit', 'Zlatni Delises', 'Brokoli', 
			'Avokado', 'Ratluk', 'Crvena Paprika', 'Zelena Salata'
		]),
        'price' 	 => $faker->randomElement(['45','37', '80']),
        'row_id' 	 => uniqid(),
        'qty'    	 => $faker->numberBetween(1, 10),
        'weight'     => $faker->numberBetween(0.0, 2.5),
    ];
});
