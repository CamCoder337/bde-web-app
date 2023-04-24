<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Category::factory()->count(5)->create();
        User::factory()->count(10)
            ->has(
                Order::factory()
                    ->count(3)
                    ->hasAttached(
                        Product::factory()->count(7),
                        ['total_price' => rand(100,500), 'total_quantity' => rand(1,5)]
                    )

            )->create();
    }
}
