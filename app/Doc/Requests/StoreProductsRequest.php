<?php

namespace App\Doc\Requests;

/**
 * @OA\Schema(
 *      title="Store product request",
 *      description="Store product request body data",
 *      type="object",
 *      required={"name", "description"}
 * )
 */
class StoreProductsRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="name of the new product",
     *      example="Banana"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="description",
     *      description="description of the new product",
     *      example="Good fruit"
     * )
     *
     * @var string
     */
    public $description;
}
