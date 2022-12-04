<?php

namespace App\Doc\Models;

/**
 * @OA\Schema(
 *     title="Stock",
 *     description="Stock model",
 *     @OA\Xml(
 *         name="Stock"
 *     )
 * )
 */
class Stock
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

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
     *      title="Balance",
     *      description="Current balance of the Stock",
     *      format="int64",
     *      example="5"
     * )
     *
     * @var integer
     */
    public $balance;

    /**
     * @OA\Property(
     *      title="Reserved",
     *      description="Reserved balance of the Stock",
     *      example=0
     * )
     *
     * @var integer|null
     */
    public $reserved;

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
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;
}
