<?php

namespace App\Doc\Requests;

/**
 * @OA\Schema(
 *      title="Store stock request",
 *      description="Store stock request body data",
 *      type="object",
 *      required={"fk_product", "value", "inbound", "validate_date"}
 * )
 */
class StoreStockRequest
{
    /**
     * @OA\Property(
     *     title="Product Foreing Key",
     *     description="ID of Product",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    public $fk_product;

    /**
     * @OA\Property(
     *      title="Inbound",
     *      description="Initial balance of the Stock",
     *      format="int64",
     *      example="10"
     * )
     *
     * @var integer
     */
    public $inbound;

    /**
     * @OA\Property(
     *     title="Value",
     *     description="Value of product of the stock",
     *     example=0.5,
     *     format="number",
     *     type="double"
     * )
     *
     * @var \DateTime
     */
    public $value;

    /**
     * @OA\Property(
     *     title="Validate date",
     *     description="Validate date of the Stock",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    public $validate_date;
}
