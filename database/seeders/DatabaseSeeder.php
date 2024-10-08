<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Event;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'role' => 'ADMIN',
            'phonenumber' => '087810615021',
            'address' => 'jl.jatingaleh',
            'city' => 'semarang',
        ]);

        Provider::create([
            'name' => 'Telkom',
        ]);

        Provider::create([
            'name' => 'Nexa',
        ]);

        Provider::create([
            'name' => 'Lintasarta',
        ]);

        Provider::create([
            'name' => 'Sijoli',
        ]);
    }
}
