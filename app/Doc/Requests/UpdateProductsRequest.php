<?php

namespace App\Doc\Requests;

/**
 * @OA\Schema(
 *      title="Update product request",
 *      description="UPdate product request body data",
 *      type="object",
 * )
 */
class UpdateProductsRequest
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
