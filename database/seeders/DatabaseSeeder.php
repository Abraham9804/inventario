<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Abraham',
            'email' => 'sistemas@precision-plating.com',
            'password' => '12qwaszx'
        ]);

        $this->call([
            CategorySeeder::class
        ]);

        Product::factory()
            ->count(50)
            ->create();
    }
}
