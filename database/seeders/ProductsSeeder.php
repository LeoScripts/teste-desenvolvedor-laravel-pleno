<?php

namespace Database\Seeders;

use Database\Factories\ProductsFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductsFactory::factory(10)->create();
    }
}
