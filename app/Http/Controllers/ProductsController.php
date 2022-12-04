<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\Products;
use App\Models\Stock;

class ProductsController extends Controller
{
    /**
     * @return Products[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            return Products::all();
        } catch (\Throwable $th) {
            return response()->json('Error listing product: ' . $th->getMessage(), 500);
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
        } catch (\Throwable $th) {
            return response()->json('Error adding product: ' . $th->getMessage(), 500);
        }
    }

    /**
     * Summary of show
     * @param Products $products
     * @param string $id
     * @return mixed
     */
    public function show(Products $products, string $id)
    {
        try {
            $product = $products->find($id);
            return $product ?? response()->json('Product not found.', 404);
        } catch (\Throwable $th) {
            return response()->json('Error getting product: ' . $th->getMessage(), 500);
        }
    }

    /**
     * Summary of update
     * @param UpdateProductsRequest $request
     * @param Products $products
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateProductsRequest $request, Products $products, string $id)
    {
        try {
            $product = $products->find($id);

            if (!$product) return response()->json('Product not found.', 404);

            $product->update($request->all());
            return response()->json('Product updated successfully.');
        } catch (\Throwable $th) {
            return response()->json('Error updating product: ' . $th->getMessage(), 500);
        }
    }

    /**
     * Summary of destroy
     * @param Products $products
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Products $products, string $id)
    {
        try {
            $product = $products->find($id);

            if (!$product) return response()->json('Product not found.', 404);

            $stocks = Stock::where('fk_product', $id)->get();
            if (!$stocks) return response()->json("Can't delete the product how has some stock attached.", 406);

            $product->delete();
            return response()->json('Product deleted successfully.');
        } catch (\Throwable $th) {
            return response()->json('Error deleting product: ' . $th->getMessage(), 500);
        }
    }
}
