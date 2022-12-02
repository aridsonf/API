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
            Products::create($request->all());

            return response()->json('Product created successfully.');
        } catch (\Exception $ex) {
            return response()->json('Error adding product: ' . $ex, 500);
        }
    }

    /**
     * @param Products $products
     * @return Products|\Illuminate\Http\JsonResponse
     */
    public function show(Products $products, string $id)
    {
        try {
            $product = $products->find($id);
            return $product ?? response()->json('Product not found', 404);
        } catch (\Exception $ex) {
            return response()->json('Error getting product: ' . $ex, 500);
        }
    }

    /**
     * @param UpdateProductsRequest $request
     * @param Products $products
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateProductsRequest $request, Products $products, string $id)
    {
        try {
            $product = $products->find($id);

            if (!$product) return response()->json('Product not found', 404);

            $product = $product->update($request->all());
            return response()->json('Product updated successfully.');
        } catch (\Exception $ex) {
            return response()->json('Error updating product: ' . $ex, 500);
        }
    }

    /**
     * @param Products $products
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Products $products, string $id)
    {
        try {
            $product = $products->find($id);

            if (!$product) return response()->json('Product not found', 404);

            $product->delete();
            return response()->json('Product deleted successfully.');
        } catch (\Exception $ex) {
            return response()->json('Error deleting product: ' . $ex, 500);
        }
    }
}
