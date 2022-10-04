<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\Products;

class ProductsController extends Controller
{
    /**
     * @return Products[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            return Products::all();
        } catch (\Exception $ex) {
            return response()->json('Error listing product: ' . $ex, 500);
        }
    }

    /**
     * @param StoreProductsRequest $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(StoreProductsRequest $request)
    {
        try {
            Products::create([
                'name' => $request->name,
                'description' => $request->description ?? 'no description'
            ]);

            return response()->json('Product created successfully.');
        } catch (\Exception $ex) {
            return response()->json('Error adding product: ' . $ex, 500);
        }
    }

    /**
     * @param UpdateProductsRequest $request
     * @param Products $products
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateProductsRequest $request, Products $products)
    {
        try {
            $products->update([
                'name' => $request->name,
                'description' => $request->description ?? 'no description'
            ]);

            return response()->json('Product updated successfully.');
        } catch (\Exception $ex) {
            return response()->json('Error updating product: ' . $ex, 500);
        }
    }

    /**
     * @param Products $products
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Products $products)
    {
        try {
            $products->delete();

            return response()->json('Product deleted successfully.');
        } catch (\Exception $ex) {
            return response()->json('Error deleting product: ' . $ex, 500);
        }
    }
}
