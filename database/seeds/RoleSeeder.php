<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        $roles = [
            [
                'name' => 'admin'
            ],
            [
                'name' => 'foodbroker'
            ],
            [
                'name' => 'korisnik'
            ]
        ];
        foreach ($roles as $role) 
        {
            Role::create($role);
        }
    }
}
