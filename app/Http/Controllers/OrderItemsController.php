<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderItemsRequest;
use App\Http\Requests\UpdateOrderItemsRequest;
use App\Models\OrderItems;

class OrderItemsController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Http\JsonResponse|array<OrderItems>
     */
    public function index()
    {
        try {
            return OrderItems::all();
        } catch (\Throwable $th) {
            return response()->json('Error listing order items: ' . $th->getMessage(), 500);
        }
    }

    /**
     * Summary of store
     * @param StoreOrderItemsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreOrderItemsRequest $request)
    {
        try {
            OrderItems::create($request->all());

            return response()->json('Item created successfully.');
        } catch (\Throwable $th) {
            return response()->json('Error adding item: ' . $th->getMessage(), 500);
        }
    }

    /**
     * Summary of show
     * @param OrderItems $orderItems
     * @param string $id
     * @return mixed
     */
    public function show(OrderItems $orderItems, string $id)
    {
        try {
            $item = $orderItems->find($id);
            return $item ?? response()->json('Item not found.', 404);
        } catch (\Throwable $th) {
            return response()->json('Error getting item: ' . $th->getMessage(), 500);
        }
    }

    /**
     * Summary of update
     * @param UpdateOrderItemsRequest $request
     * @param OrderItems $orderItems
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateOrderItemsRequest $request, OrderItems $orderItems, string $id)
    {
        try {
            $item = $orderItems->find($id);

            if (!$item) return response()->json('Item not found.', 404);

            $item->update($request->all());
            return response()->json('Item updated successfully.');
        } catch (\Throwable $th) {
            return response()->json('Error updating item: ' . $th->getMessage(), 500);
        }
    }

    /**
     * Summary of destroy
     * @param OrderItems $orderItems
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(OrderItems $orderItems, string $id)
    {
        try {
            $item = $orderItems->find($id);

            if (!$item) return response()->json('Item not found.', 404);

            $item->delete();
            return response()->json('Item deleted successfully.');
        } catch (\Throwable $th) {
            return response()->json('Error deleting item: ' . $th->getMessage(), 500);
        }
    }
}
