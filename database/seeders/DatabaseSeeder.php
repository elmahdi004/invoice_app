<?php

namespace Database\Seeders;

use App\Models\Counter;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Item;
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
        // User::factory(10)->create();
        // Counter::factory(1)->create();
        // Product::factory(20)->create();
        // Customer::factory(20)->create();
        // Invoice::factory(10)->create();
        Item::factory(10)->create();

    }
}
