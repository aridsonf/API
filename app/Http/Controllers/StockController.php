<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;
use App\Models\Products;
use App\Models\Stock;

class StockController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Http\JsonResponse|array<Stock>
     */
    public function index()
    {
        try {
            return Stock::all();
        } catch (\Throwable $th) {
            return response()->json('Error listing stocks: ' . $th->getMessage(), 500);
        }
    }

    /**
     * Summary of store
     * @param StoreStockRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreStockRequest $request)
    {
        try {
            $product = Products::find($request->fk_product);

            if (!$product) return response()->json('Product for stock not found.', 404);

            $data = $request->all();
            $data['balance'] = $data['inbound'];

            Stock::create($data);

            return response()->json('Stock created successfully.');
        } catch (\Throwable $th) {
            return response()->json('Error adding stock: ' . $th->getMessage(), 500);
        }
    }

    /**
     * Summary of show
     * @param Stock $stock
     * @return Stock|\Illuminate\Http\JsonResponse
     */
    public function show(Stock $stock)
    {
        try {
            return $stock;
        } catch (\Throwable $th) {
            return response()->json('Error getting stock: ' . $th->getMessage(), 500);
        }
    }

    /**
     * Summary of update
     * @param UpdateStockRequest $request
     * @param Stock $stock
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateStockRequest $request, Stock $stock)
    {
        try {
            if ($stock['inbound'] < $request->balance)
                return response()->json("The stock balance can't be higher than the initial balance of the stock.", 406);

            $stock->update($request->all());
            return response()->json('Stock updated successfully.');
        } catch (\Throwable $th) {
            return response()->json('Error updating stock: ' . $th->getMessage(), 500);
        }
    }

    /**
     * Summary of destroy
     * @param Stock $stock
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Stock $stock)
    {
        try {
            $stock->delete();

            return response()->json('Stock deleted successfully.');
        } catch (\Throwable $th) {
            return response()->json('Error deleting stock: ' . $th->getMessage(), 500);
        }
    }
}
