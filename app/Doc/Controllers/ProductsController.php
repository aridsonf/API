<?php

namespace App\Doc\Controllers;


class ProductsController
{
    /**
     * @OA\Tag(
     *      name="Products",
     *      description="Products"
     * ),
     *
     * @OA\Get(
     *     path="/prodcuts",
     *     tags={"Products"},
     *     summary="List all products",
     *     operationId="listProducts",
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 ref="#/components/schemas/Products")
     *              ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error"
     *     )
     * )
     */
    public function index()
    {
    }

    /**
     * @OA\Post(
     *     path="/prodcuts",
     *     tags={"Products"},
     *     summary="Create a product",
     *     operationId="createProduct",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreProductsRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
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
     * @OA\Get(
     *     path="/prodcuts/{id}",
     *     tags={"Products"},
     *     summary="Get a product",
     *     operationId="showProduct",
     *     @OA\Parameter(
     *          name="id",
     *          description="Product id",
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
     *             ref="#/components/schemas/Products"
     *         ),
     *     ),
     *     @OA\Response(
     *          response=404,
     *          description="Product not found"
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
     * @OA\Put(
     *     path="/prodcuts/{id}",
     *     tags={"Products"},
     *     summary="Update a product",
     *     operationId="updateProduct",
     *     @OA\Parameter(
     *          name="id",
     *          description="Product id",
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
     *          @OA\JsonContent(ref="#/components/schemas/UpdateProductsRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     ),
     *     @OA\Response(
     *          response=404,
     *          description="Product not found"
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
     *     path="/prodcuts/{id}",
     *     tags={"Products"},
     *     summary="Delete a product",
     *     operationId="deleteProduct",
     *     @OA\Parameter(
     *          name="id",
     *          description="Product id",
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
     *          description="Product not found"
     *     ),
     *     @OA\Response(
     *          response=406,
     *          description="Product can't be deleted"
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
