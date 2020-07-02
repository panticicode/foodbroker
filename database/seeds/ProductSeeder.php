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
                'title' => 'Ananas',
                'cat_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'ananas.png'
            ],
            [
                'title' => 'Banane',
                'cat_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 1,
                'image' => 'banane.png'
            ],
            [
                'title' => 'Banane',
                'cat_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 1,
                'image' => 'banane.png'
            ],
            [
                'title' => 'Dinja',
                'cat_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'dinje.png'
            ],
            [
                'title' => 'Grejpfrut',
                'cat_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 1,
                'image' => 'grejpfrut.png'
            ],
            [
                'title' => 'Grejpfrut',
                'cat_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'grejpfrut.png'
            ],
            [
                'title' => 'Ajdared',
                'cat_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'ajdared.png'
            ],
            [
                'title' => 'Crveni Delises',
                'cat_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'crveni-delises.png'
            ],
            [
                'title' => 'Crveni Delises',
                'cat_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'crveni-delises.png'
            ],
            [
                'title' => 'Greni Smit',
                'cat_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'greni-smit.png'
            ],
            [
                'title' => 'Zlatni Delises',
                'cat_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'zlatni-delises.png'
            ],
            [
                'title' => 'Zlatni Delises',
                'cat_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'zlatni-delises.png'
            ],
            [
                'title' => 'Ajdared',
                'cat_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'ajdared.png'
            ],
            [
                'title' => 'Zlatni Delises',
                'cat_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'zlatni-delises.png'
            ],
            [
                'title' => 'Zlatni Delises',
                'cat_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'zlatni-delises.png'
            ],
            [
                'title' => 'Brokoli',
                'cat_id' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'brokoli.png'
            ],
            [
                'title' => 'Avokado',
                'cat_id' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'avokado.png'
            ],
            [
                'title' => 'Ratluk',
                'cat_id' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'ratluk.png'
            ],
            [
                'title' => 'Crvena Paprika',
                'cat_id' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'crvena-paprika.png'
            ],
            [
                'title' => 'Zelena salata',
                'cat_id' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'zelena-salata.png'
            ],
            [
                'title' => 'ratluk',
                'cat_id' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'ratluk.png'
            ],
            [
                'title' => 'Brokoli',
                'cat_id' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'brokoli.png'
            ],
            [
                'title' => 'Zelena Salata',
                'cat_id' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'zelena-salata.png'
            ],
            [
                'title' => 'Crvena paprika',
                'cat_id' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'crvena-paprika.png'
            ],
            [
                'title' => 'Zelena salata',
                'cat_id' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'zelena-salata.png'
            ],
            [
                'title' => 'Brokoli',
                'cat_id' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'brokoli.png'
            ],
            [
                'title' => 'Avokado',
                'cat_id' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'avokado.png'
            ],
            [
                'title' => 'Crvena paprika',
                'cat_id' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'crvena-paprika.png'
            ],
            [
                'title' => 'Ratluk',
                'cat_id' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'ratluk.png'
            ],
            [
                'title' => 'Brokoli',
                'cat_id' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'price' => rand(20, 50),
                'visibility' => 1,
                'quantity' => 0,
                'image' => 'brokoli.png'
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
        //         'cat_id' => 1,
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
