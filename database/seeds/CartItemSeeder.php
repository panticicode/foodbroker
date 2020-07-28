<?php

use Illuminate\Database\Seeder;
use App\Models\CartItem;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	CartItem::truncate();

        factory(App\Models\CartItem::class, 15)->create();  
    }
}
