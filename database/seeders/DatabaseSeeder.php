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
        Seeds the user roles table, Important that this is seeded first
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
        
        //demo patient
        \App\Models\User::create([
            'name' => 'Demo Patient',
            'email' => 'patient@demo.com',
            'role_id' => 1,
            'password' => 'demoPatient'
         ]);

        //demo doctor
        \App\Models\User::create([
            'name' => 'Demo doctor',
            'email' => 'doctor@demo.com',
            'role_id' => 2,
            'password' => 'demoDoctor'
         ]);

        //demo administrator
        \App\Models\User::create([
            'name' => 'Demo Admin',
            'email' => 'Admin@demo.com',
            'role_id' => 3,
            'password' => 'demoAdmin'
         ]);
        
        /* seeds the users */
        \App\Models\User::factory(100)->create();

        /* create 3 months worth of posts data for 100 fake users, plus the 3 demo users */
        for ($i=0; $i<90; $i++){
            \App\Models\PainAnalysis::factory(103)->create();
        }
    }
}