<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'title' => 'Sample Product',
            'description' => 'This is a sample product for the PoC.',
            'price' => 19.99,
            'category' => 'Gents',
            'location' => 'bd',
            'images' => json_encode(['https://via.placeholder.com/150']),
        ]);
    }
}
