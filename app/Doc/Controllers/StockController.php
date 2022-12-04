<?php

namespace App\Doc\Controllers;


class StockController
{
    /**
     * @OA\Tag(
     *      name="Stock",
     *      description="Stock"
     * ),
     *
     * @OA\Get(
     *     path="/stock",
     *     tags={"Stock"},
     *     summary="List all stock",
     *     operationId="listStock",
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 ref="#/components/schemas/Stock")
     *              ),
     *         ),
     *     )
     * )
     */
    public function index()
    {
    }


    /**
     * @OA\Get(
     *     path="/stock/{id}",
     *     tags={"Stock"},
     *     summary="Get a stock",
     *     operationId="showStock",
     *     @OA\Parameter(
     *          name="id",
     *          description="Stock id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          ),
     *          @OA\Examples(example="int", value="1", summary="An int value.")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             ref="#/components/schemas/Stock"
     *         ),
     *     ),
     *     @OA\Response(
     *          response=404,
     *          description="Stock not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error"
     *     )
     * )
     */
    public function show()
    {
    }

    /**
     * @OA\Post(
     *     path="/stock",
     *     tags={"Stock"},
     *     summary="Create a stock",
     *     operationId="createStock",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreStockRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     ),
     *     @OA\Response(
     *          response=404,
     *          description="Product for stock not found"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Content",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     * 		          property="message",
     * 		          type="array",
     *                @OA\Items(type="string"),
     * 	           ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error"
     *     )
     * )
     */
    public function store()
    {
    }

    /**
     * @OA\Put(
     *     path="/stock/{id}",
     *     tags={"Stock"},
     *     summary="Update a stock",
     *     operationId="updateStock",
     *     @OA\Parameter(
     *          name="id",
     *          description="Stock id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          ),
     *          @OA\Examples(example="int", value="1", summary="An int value.")
     *     ),
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateStockRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     ),
     *     @OA\Response(
     *          response=404,
     *          description="Stock not found"
     *     ),
     *     @OA\Response(
     *          response=406,
     *          description="Stock balance higher than the initial balance"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Content",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     * 		          property="message",
     * 		          type="array",
     *                @OA\Items(type="string"),
     * 	           ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error"
     *     )
     * )
     */
    public function update()
    {
    }

    /**
     * @OA\Delete(
     *     path="/stock/{id}",
     *     tags={"Stock"},
     *     summary="Delete a stock",
     *     operationId="deleteStock",
     *     @OA\Parameter(
     *          name="id",
     *          description="Stock id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          ),
     *          @OA\Examples(example="int", value="1", summary="An int value.")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     ),
     *     @OA\Response(
     *          response=404,
     *          description="Stock not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error"
     *     )
     * )
     */
    public function destroy()
    {
    }
}
