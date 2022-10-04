<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_the_route_return_products()
    {
        $response = $this->get('/api/products');

        $response->assertStatus(200);
    }

    public function test_the_route_return_products_structure()
    {
        $response = $this->get('/api/products');

        $response->assertJsonStructure([
            '*' => [
                'name',
                'description',
            ]
        ]);
    }

    public function test_store_product()
    {
        $response = $this->post('/api/products', [
            'name' => 'Product 1',
            'description' => 'Description 1'
        ]);

        $response->assertStatus(200);
    }

    public function test_update_product()
    {
        $this->post('/api/products', [
            'name' => 'Product 1',
            'description' => 'Description 1'
        ]);

        $product = \App\Models\Products::orderBy('id', 'desc')->first();

        $response = $this->put('/api/products/' . $product, [
            'name' => 'Product 1',
            'description' => 'Description 1'
        ]);

        $response->assertStatus(200);
    }

    public function test_delete_product()
    {
        $response = $this->delete('/api/products/1');

        $response->assertStatus(200);
    }

    public function test_store_product_validation()
    {
        $response = $this->post('/api/products', [
            'name' => '',
            'description' => ''
        ]);

        $response->assertStatus(302);
    }

    public function test_update_product_validation()
    {
        $response = $this->put('/api/products/1', [
            'name' => '',
            'description' => ''
        ]);

        $response->assertStatus(302);
    }
}
