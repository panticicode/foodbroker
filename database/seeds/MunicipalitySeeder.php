<?php

use Illuminate\Database\Seeder;
use App\Models\Municipality;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Municipality::truncate();

        $municipalities = [
            [
                'name' => 'Čukarica'
            ],
            [
                'name' => 'Novi Beograd'
            ],
            [
                'name' => 'Palilula'
            ],
            [
                'name' => 'Rakovica'
            ],
            [
                'name' => 'Savski venac'
            ],
            [
                'name' => 'Stari grad'
            ],
            [
                'name' => 'Voždovac'
            ],
            [
                'name' => 'Vračar'
            ],
            [
                'name' => 'Zemun'
            ],
            [
                'name' => 'Zvezdara'
            ]
        ];
        foreach ($municipalities as $municipality) 
        {
            Municipality::create($municipality);
        }
    }
}
