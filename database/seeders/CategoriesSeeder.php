<?php

namespace Database\Seeders;

use Database\Factories\CategoriesFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    CategoriesFactory::factory(5)->create();
  }
}
