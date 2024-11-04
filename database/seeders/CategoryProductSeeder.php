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
            ['name' => 'Electronics'],
            ['name' => 'Furniture'],
            ['name' => 'Clothing'],
            ['name' => 'Toys'],
            ['name' => 'Books'],
        ];

        foreach ($categories as $categoryData) {
            $category = Category::create($categoryData);

            Product::create([
                'name' => 'Product 1 for ' . $category->name,
                'category_id' => $category->id,
                'price' => 100.00,
                'quantity' => 50,
            ]);

            Product::create([
                'name' => 'Product 2 for ' . $category->name,
                'category_id' => $category->id,
                'price' => 150.00,
                'quantity' => 30,
            ]);
        }
    }

}
