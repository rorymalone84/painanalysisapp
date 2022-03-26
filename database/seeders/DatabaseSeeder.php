<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        /*
        Seeds the user roles table
        */
        \App\Models\Role::create([
            'role' => 'Patient'
        ]);

        \App\Models\Role::create([
            'role' => 'Doctor'
        ]);

        \App\Models\Role::create([
           'role' => 'Admin'
        ]);

        //default admin user

        \App\Models\User::create([
            'name' => 'Rory',
            'email' => 'rorymalone@live.com',
            'role_id' => 2,
            'password' => '$2y$10$eAzH8aQJHyL.d..xYr7.kuBjbLBPuZ6VUtmNWMQkZauibYetV4ufq'
         ]);
        
        /* seeds the users */
        \App\Models\User::factory(100)->create();
    }
}