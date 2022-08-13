<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'is_admin' => true,
            'name' => "Ricky Andrean",
            'email' => "Kuroyasha",
            'password' => bcrypt('Ricky4424')
        ]);
        User::create([
            'is_marketing' => true,
            'name' => "Ricky Andrean",
            'email' => "Kuroyasha1@gmail.com",
            'password' => bcrypt('Ricky4424')
        ]);
        User::create([
            'is_analis' => true,
            'name' => "Ricky Andrean",
            'email' => "Kuroyasha2@gmail.com",
            'password' => bcrypt('Ricky4424')
        ]);
        User::create([
            'is_komite1' => true,
            'name' => "Ricky Andrean",
            'email' => "Kuroyasha3@gmail.com",
            'password' => bcrypt('Ricky4424')
        ]);
        User::create([
            'is_komite2' => true,
            'name' => "Ricky Andrean",
            'email' => "Kuroyasha4@gmail.com",
            'password' => bcrypt('Ricky4424')
        ]);
    }
}
