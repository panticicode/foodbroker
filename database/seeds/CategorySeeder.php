<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        $categories = [
            [
                'title' => 'Voce',
                'image' => 'voce.png'
            ],
            [
                'title' => 'Povrce',
                'image' => 'povrce.png'
            ],
            [
                'title' => 'Bilje i Gljive',
                'image' => 'gljive.png'
            ],
            [
                'title' => 'Mesara',
                'image' => 'mesara.png'
            ],
            [
                'title' => 'Mlecni Proizvodi',
                'image' => 'mlecni.png'
            ],
            [
                'title' => 'Domaca Hrana',
                'image' => 'domaci.png'
            ],
            [
                'title' => 'Zdrava hrana',
                'image' => 'zdrava.png'
            ]
        ];
        // $categories = [
        //     [
        //         'title' => 'Voće',
        //         'image' => 'povrce@2x.png'
        //     ],
        //     [
        //         'title' => 'Povrće',
        //         'image' => 'povrce@2x.png'
        //     ],
        //     [
        //         'title' => 'Bilje i Gljive',
        //         'image' => 'povrce@2x.png'
        //     ],
        //     [
        //         'title' => 'Mesara',
        //         'image' => 'povrce@2x.png'
        //     ],
        //     [
        //         'title' => 'Mlečni Proizvodi',
        //         'image' => 'povrce@2x.png'
        //     ],
        //     [
        //         'title' => 'Domaća Hrana',
        //         'image' => 'povrce@2x.png'
        //     ],
        //     [
        //         'title' => 'Zdrava Hrana',
        //         'image' => 'povrce@2x.png'
        //     ]
        // ];
        foreach ($categories as $category) 
        {
            Category::create($category);
        }
    }
}
