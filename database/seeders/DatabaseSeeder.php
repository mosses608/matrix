<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'mozzeh@123',
            'email' => 'mozzeh608@gmail.com',
            'contact' => '071006657',
            'username' => 'muddy@123',
            'password' => '123456789',
        ]);
        User::create([
            'name' => 'Benezeth',
            'email' => 'benezethptrus@gmail.com',
            'contact' => '0612081410',
            'username' => 'benny@123',
            'password' => '1234567890',
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
