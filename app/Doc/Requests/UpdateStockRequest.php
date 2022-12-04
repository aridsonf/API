<?php

namespace App\Doc\Requests;

/**
 * @OA\Schema(
 *      title="Update stock request",
 *      description="Update stock request body data",
 *      type="object",
 * )
 */
class UpdateStockRequest
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
     *      title="Balance",
     *      description="Currency balance of the Stock",
     *      format="int64",
     *      example="10"
     * )
     *
     * @var integer
     */
    public $balance;

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
