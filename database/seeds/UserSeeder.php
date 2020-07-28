<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::where('role_id', 1)->forceDelete();
    	User::where('role_id', 2)->forceDelete();
        User::where('role_id', 3)->forceDelete();
        User::where('role_id', 4)->forceDelete();
        User::where('role_id', 5)->forceDelete();
        
        $user = User::create([
        	'name' => 'Admin',
        	'role_id' => 1,
        	'email' => 'admin@mail',
        	'password' => bcrypt('123')
        ]);
        $user = User::create([
        	'name' => 'FoodBroker',
        	'role_id' => 2,
        	'cardId' => '123456',
        	'municipality' => 'Zemun',
        	'address' => 'Prvomajska 23',
        	'phone' => '123456789',
        	'email' => 'foodbroker@mail',
        	'password' => bcrypt('123')
        ]);
        $user = User::create([
            'name' => 'Petar Petrovic',
            'role_id' => 3,
            'cardId' => '123456',
            'municipality' => 'Palilula',
            'address' => 'Palilulska 112',
            'phone' => '064123456789',
            'email' => 'test@mail',
            'password' => bcrypt('123')
        ]);
        $user = User::create([
            'name' => 'Janko Jankovic',
            'role_id' => 3,
            'cardId' => '123456',
            'municipality' => 'Zemun',
            'address' => 'Prvomajska 12',
            'phone' => '064112335',
            'email' => 'janko@mail',
            'password' => bcrypt('123')
        ]);
        $user = User::create([
            'name' => 'Marko Markovic',
            'role_id' => 3,
            'cardId' => '123456',
            'municipality' => 'Novi Beograd',
            'address' => 'Avijaticarska 121',
            'phone' => '0642235524',
            'email' => 'marko@mail',
            'password' => bcrypt('123')
        ]);
    }
}


