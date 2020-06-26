<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        $products = [
            [
                'title' => 'Jabuke',
                'cat_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'quantity' => 0,
                'image' => 'jabuke.png'
            ],
            [
                'title' => 'Ananas',
                'cat_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 0,
                'quantity' => 1,
                'image' => 'jabuke.png'
            ],
            [
                'title' => 'Pomorandze',
                'cat_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 0,
                'quantity' => 0,
                'image' => 'pomorandze.png'
            ],
            [
                'title' => 'Jabuke',
                'cat_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'jabuke.png'
            ],
            [
                'title' => 'Konzerva',
                'cat_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 0,
                'quantity' => 1,
                'image' => 'dzem.png'
            ],
            [
                'title' => 'Kivi',
                'cat_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'jabuke.png'
            ],
            [
                'title' => 'Kupus',
                'cat_id' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'kupus.png'
            ],
            [
                'title' => 'Kupus',
                'cat_id' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'kupus.png'
            ],
            [
                'title' => 'Kupus',
                'cat_id' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'kupus.png'
            ],
            [
                'title' => 'Kupus',
                'cat_id' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'kupus.png'
            ],
            [
                'title' => 'Kupus',
                'cat_id' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'kupus.png'
            ],
            [
                'title' => 'Kupus',
                'cat_id' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'kupus.png'
            ],
            [
                'title' => 'Sampinjoni',
                'cat_id' => 3,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'gljive.png'
            ],
            [
                'title' => 'Sampinjoni',
                'cat_id' => 3,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'gljive.png'
            ],
            [
                'title' => 'Sampinjoni',
                'cat_id' => 3,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'gljive.png'
            ],
            [
                'title' => 'Sampinjoni',
                'cat_id' => 3,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'gljive.png'
            ],
            [
                'title' => 'Sampinjoni',
                'cat_id' => 3,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'gljive.png'
            ],
            [
                'title' => 'Sampinjoni',
                'cat_id' => 3,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'gljive.png'
            ],
            [
                'title' => 'Kackavalj',
                'cat_id' => 4,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'mlecni.png'
            ],
            [
                'title' => 'Kackavalj',
                'cat_id' => 4,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'mlecni.png'
            ],
            [
                'title' => 'Kackavalj',
                'cat_id' => 4,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'mlecni.png'
            ],
            [
                'title' => 'Kackavalj',
                'cat_id' => 4,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'mlecni.png'
            ],
            [
                'title' => 'Kackavalj',
                'cat_id' => 4,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'mlecni.png'
            ],
            [
                'title' => 'Kackavalj',
                'cat_id' => 4,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'mlecni.png'
            ],
            [
                'title' => 'Neko Meso',
                'cat_id' => 5,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'meso.png'
            ],
            [
                'title' => 'Neko Meso',
                'cat_id' => 5,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'meso.png'
            ],
            [
                'title' => 'Neko Meso',
                'cat_id' => 5,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'meso.png'
            ],
            [
                'title' => 'Neko Meso',
                'cat_id' => 5,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'meso.png'
            ],
            [
                'title' => 'Neko Meso',
                'cat_id' => 5,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'meso.png'
            ],
            [
                'title' => 'Neko Meso',
                'cat_id' => 5,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'meso.png'
            ],
            [
                'title' => 'Zdrava Hrana',
                'cat_id' => 6,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'zdrava.png'
            ],
            [
                'title' => 'Zdrava Hrana',
                'cat_id' => 6,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'zdrava.png'
            ],
            [
                'title' => 'Zdrava Hrana',
                'cat_id' => 6,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'zdrava.png'
            ],
            [
                'title' => 'Zdrava Hrana',
                'cat_id' => 6,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'zdrava.png'
            ],
            [
                'title' => 'Zdrava Hrana',
                'cat_id' => 6,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'zdrava.png'
            ],
            [
                'title' => 'Zdrava Hrana',
                'cat_id' => 6,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'zdrava.png'
            ],
            [
                'title' => 'Dzem',
                'cat_id' => 7,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'dzem.png'
            ],
            [
                'title' => 'Dzem',
                'cat_id' => 7,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'dzem.png'
            ],
            [
                'title' => 'Dzem',
                'cat_id' => 7,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'dzem.png'
            ],
            [
                'title' => 'Dzem',
                'cat_id' => 7,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'dzem.png'
            ],
            [
                'title' => 'Dzem',
                'cat_id' => 7,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'dzem.png'
            ],
            [
                'title' => 'Dzem',
                'cat_id' => 7,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'dzem.png'
            ]
            
        ];
        // $products = [
        //     [
        //         'title' => 'Jabuke',
        //         'cat_id' => 1,
        //         'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        //         'price' => rand(20, 50),
        //         'visibility' => 1,
        //         'quantity' => 0,
        //         'image' => 'jabuke.png'
        //     ],
        //     [
        //         'title' => 'Kupus',
        //         'cat_id' => 2,
        //         'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        //         'price' => rand(20, 50),
        //         'visibility' => 1,
        //         'quantity' => 0,
        //         'image' => 'kupus.png'
        //     ],
        //     [
        //         'title' => 'Sampinjoni',
        //         'cat_id' => 3,
        //         'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        //         'price' => rand(20, 50),
        //         'visibility' => 1,
        //         'quantity' => 0,
        //         'image' => 'gljive.png'
        //     ],
        //     [
        //         'title' => 'Juneci but',
        //         'cat_id' => 4,
        //         'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        //         'price' => rand(20, 50),
        //         'visibility' => 1,
        //         'quantity' => 0,
        //         'image' => 'meso.png'
        //     ],
        //     [
        //         'title' => 'Domaci Dzem',
        //         'cat_id' => 5,
        //         'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        //         'price' => rand(20, 50),
        //         'visibility' => 1,
        //         'quantity' => 1,
        //         'image' => 'dzem.png'
        //     ],
        //     [
        //         'title' => 'Ajvar',
        //         'cat_id' => 6,
        //         'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        //         'price' => rand(20, 50),
        //         'visibility' => 1,
        //         'quantity' => 1,
        //         'image' => 'domaci.png'
        //     ],
        // ];
        foreach ($products as $product) 
        {
            Product::create($product);
        }
    }
}
