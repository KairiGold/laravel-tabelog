<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            CategorySeeder::class,
            ShopSeeder::class,
            CompanySeeder::class,
            TermSeeder::class,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
        ]);
    }
}
