<?php

namespace Tests\Feature;

use App\Models\Products;
use App\Models\Stock;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class StockTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Summary of createFactoryForTest
     * @return void
     */
    private function createFactoryForTest()
    {
        Products::factory()->create();
    }

    /**
     * @return void
     */
    public function testListStock()
    {
        $response = $this->get('/api/stock');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testListStockStructure()
    {
        $response = $this->get('/api/stock');

        $response->assertJsonStructure([
            '*' => [
                'id',
                'fk_product',
                'inbound',
                'balance',
                'reserved',
                'validate_date',
                'value',
                'created_at',
                'updated_at',
            ]
        ]);
    }

    /**
     * @return void
     */
    public function testSaveStock()
    {
        $this->createFactoryForTest();

        $product = Products::orderBy('id', 'desc')->first();

        $response = $this->post('/api/stock', [
            'fk_product' => $product->id,
            'value' => 0.5,
            'inbound' => 10,
            'validate_date' => '2022-02-02'
        ]);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testUpdateStock()
    {
        $this->createFactoryForTest();

        $product = Products::orderBy('id', 'desc')->first();

        $this->post('/api/stock', [
            'fk_product' => $product->id,
            'inbound' => 10,
            'value' => 0.5,
            'validate_date' => '2022-02-02'
        ]);

        $stock = Stock::orderBy('id', 'desc')->first();

        $response = $this->put('/api/stock/' . $stock->id, [
            'value' => 10
        ]);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testDeleteStock()
    {
        $this->createFactoryForTest();

        $product = Products::orderBy('id', 'desc')->first();

        $this->post('/api/stock', [
            'fk_product' => $product->id,
            'inbound' => 10,
            'value' => 0.5,
            'validate_date' => '2022-02-02'
        ]);

        $stock = Stock::orderBy('id', 'desc')->first();

        $response = $this->delete('/api/stock/' . $stock->id);

        $response->assertStatus(200);
    }
}
