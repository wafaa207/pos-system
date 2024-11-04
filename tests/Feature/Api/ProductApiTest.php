<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;
use App\Models\Product;

class ProductApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_product()
    {
        $category = Category::create(['name' => 'Electronics']);

        $response = $this->postJson('/api/products', [
            'name' => 'Laptop',
            'category_id' => $category->id,
            'description' => 'A powerful laptop',
            'price' => 1500.00,
            'quantity' => 10,
            'sku' => 'LAP123'
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('products', [
            'name' => 'Laptop',
            'category_id' => $category->id,
        ]);
    }

    /** @test */
    public function it_validates_required_fields_when_creating_product()
    {
        $response = $this->postJson('/api/products', []);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name', 'category_id', 'price', 'quantity']);
    }

    /** @test */
    public function it_can_filter_products_by_category()
    {
        $category = Category::create(['name' => 'Electronics']);
        $product1 = Product::create(['name' => 'Laptop', 'category_id' => $category->id, 'description' => 'A powerful laptop', 'price' => 1500.00, 'quantity' => 10, 'sku' => 'LAP123']);
        $product2 = Product::create(['name' => 'Mouse', 'category_id' => $category->id, 'description' => 'Wireless mouse', 'price' => 25.00, 'quantity' => 50, 'sku' => 'MOU123']);

        $response = $this->getJson('/api/categories/'.$category->id.'/products');

        $response->assertStatus(200);
        $response->assertJsonCount(2);
    }

}
