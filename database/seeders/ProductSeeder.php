<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Product::create([
            'name' => 'Phalala',
            'price' => 100,
            'quantity' => 50,
            'category_id' => 2,
        ]);
    }
}
