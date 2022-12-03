<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;

class ProductsTest extends TestCase
{
    /**
     * @return void
     */
    public function testListProducts()
    {
        $response = $this->get('/api/products');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testListProductsStructure()
    {
        $response = $this->get('/api/products');

        $response->assertJsonStructure([
            '*' => [
                'name',
                'description',
            ]
        ]);
    }

    /**
     * @return void
     */
    public function testSaveProduct()
    {
        $response = $this->post('/api/products', [
            'name' => 'Product 1',
            'description' => 'Description 1'
        ]);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testUpdateProduct()
    {
        $this->post('/api/products', [
            'name' => 'Product 1',
            'description' => 'Description 1'
        ]);

        $product = \App\Models\Products::orderBy('id', 'desc')->first();

        $response = $this->put('/api/products/' . $product->id, [
            'name' => 'Product 1',
            'description' => 'Description 1'
        ]);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testDeleteProduct()
    {
        $this->post('/api/products', [
            'name' => 'Product 1',
            'description' => 'Description 1'
        ]);

        $product = \App\Models\Products::orderBy('id', 'desc')->first();

        $response = $this->delete('/api/products/' . $product->id);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testSaveProductValidation()
    {
        $response = $this->post('/api/products', [
            'name' => '',
            'description' => ''
        ]);


        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $this->assertContains(
            'Name is required',
            $response->json()['message']
        );

        $this->assertContains(
            'Description is required',
            $response->json()['message']
        );
    }

    /**
     * @return void
     */
    public function testUpdateProductValidation()
    {
        $this->post('/api/products', [
            'name' => 'Product 1',
            'description' => 'Description 1'
        ]);

        $product = \App\Models\Products::orderBy('id', 'desc')->first();

        $response = $this->put('/api/products/' . $product->id, [
            'name' => '',
            'description' => ''
        ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $this->assertContains(
            "Name can't be null",
            $response->json()['message']
        );

        $this->assertContains(
            "Description can't be null",
            $response->json()['message']
        );
    }
}
