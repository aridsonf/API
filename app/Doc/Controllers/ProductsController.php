<?php

namespace App\Doc\Controllers;


class ProductsController
{
    /**
     * @OA\Tag(
     *      name="Products",
     *      description="Products"
     *  ),
     *
     * @OA\Get(
     *     path="/prodcuts",
     *     tags={"Products"},
     *     summary="List of products",
     *     operationId="listProducts",
     *     @OA\Response(
     *         response=200,
     *         description="OK"
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
     *     summary="Get a product",
     *     operationId="createProducts",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreProductsRequest")
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
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
     *     @OA\Examples(example="int", value="1", summary="An int value.")
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     */
    public function show()
    {
    }


    public function update()
    {
    }

    public function destroy()
    {
    }
}
