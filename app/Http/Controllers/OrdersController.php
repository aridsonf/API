<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrdersRequest;
use App\Http\Requests\UpdateOrdersRequest;
use App\Models\Orders;

class OrdersController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Http\JsonResponse|array<Orders>
     */
    public function index()
    {
        try {
            return Orders::all();
        } catch (\Throwable $th) {
            return response()->json('Error listing orders: ' . $th->getMessage(), 500);
        }
    }

    /**
     * Summary of store
     * @param StoreOrdersRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreOrdersRequest $request)
    {
        try {
            Orders::create($request->all());

            return response()->json('Order created successfully.');
        } catch (\Throwable $th) {
            return response()->json('Error adding order: ' . $th->getMessage(), 500);
        }
    }

    /**
     * Summary of show
     * @param Orders $orders
     * @param string $id
     * @return mixed
     */
    public function show(Orders $orders, string $id)
    {
        try {
            $order = $orders->find($id);
            return $order ?? response()->json('Order not found.', 404);
        } catch (\Throwable $th) {
            return response()->json('Error getting order: ' . $th->getMessage(), 500);
        }
    }

    /**
     * Summary of update
     * @param UpdateOrdersRequest $request
     * @param Orders $orders
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateOrdersRequest $request, Orders $orders, string $id)
    {
        try {
            $order = $orders->find($id);

            if (!$order) return response()->json('Order not found.', 404);

            $order->update($request->all());
            return response()->json('Order updated successfully.');
        } catch (\Throwable $th) {
            return response()->json('Error updating order: ' . $th->getMessage(), 500);
        }
    }

    /**
     * Summary of destroy
     * @param Orders $orders
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Orders $orders, string $id)
    {
        try {
            $order = $orders->find($id);

            if (!$order) return response()->json('Order not found.', 404);

            $order->delete();
            return response()->json('Order deleted successfully.');
        } catch (\Throwable $th) {
            return response()->json('Error deleting order: ' . $th->getMessage(), 500);
        }
    }
}
