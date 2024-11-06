<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Electronics',
                'description' => 'Explore a wide range of electronic devices including the latest gadgets, appliances, and accessories for all your tech needs.',
            ],
            [
                'name' => 'Furniture',
                'description' => 'Discover our stylish and functional furniture collection designed to enhance any room in your home or office.',
            ],
            [
                'name' => 'Clothing',
                'description' => 'Browse through fashionable clothing for all ages and occasions, from casual wear to formal attire.',
            ],
            [
                'name' => 'Toys',
                'description' => 'Find fun and engaging toys for children of all ages, from educational toys to action figures and games.',
            ],
            [
                'name' => 'Books',
                'description' => 'Dive into our collection of books, featuring various genres from fiction and non-fiction to self-help and educational material.',
            ],
        ];

        foreach ($categories as $categoryData) {
            $category = Category::create([
                'name' => $categoryData['name'],
                'description' => $categoryData['description'],
            ]);

            Product::create([
                'name' => 'Product 1 for ' . $category->name,
                'category_id' => $category->id,
                'price' => 100.00,
                'quantity' => 50,
                'sku' => random_int(1000, 9999),
                'description' => 'High-quality product in the ' . $category->name . ' category. Perfect for enhancing your experience with ' . strtolower($category->name) . '.',
            ]);

            Product::create([
                'name' => 'Product 2 for ' . $category->name,
                'category_id' => $category->id,
                'price' => 150.00,
                'quantity' => 30,
                'sku' => random_int(1000, 9999),
                'description' => 'Another premium ' . strtolower($category->name) . ' product that combines style and functionality for everyday use.',
            ]);
        }
    }

}
