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
                'title' => 'Mlecni Proizvodi',
                'image' => 'mlecni.png'
            ],
            [
                'title' => 'Mesara',
                'image' => 'mesara.png'
            ],
            [
                'title' => 'Zdrava hrana',
                'image' => 'kupus.png'
            ],
            [
                'title' => 'Domaci Proizvodi',
                'image' => 'domaci.png'
            ]
        ];
        foreach ($categories as $category) 
        {
            Category::create($category);
        }
    }
}
