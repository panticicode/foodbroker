<?php

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::truncate();

        $countries = [
            [
                'name' => 'Srbija'
            ],
            [
                'name' => 'Makedonija'
            ],
            [
                'name' => 'BIH'
            ]
        ];
        foreach ($countries as $country) 
        {
            Country::create($country);
        }
    }
}
