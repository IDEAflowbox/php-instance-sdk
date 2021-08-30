<?php
declare(strict_types=1);

namespace Cyberkonsultant\Model;

class Product
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $code;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $image;

    /**
     * @var string
     */
    public $description;

    /**
     * @var float
     */
    public $net_price;

    /**
     * @var float
     */
    public $gross_price;

    /**
     * @var string
     */
    public $url;

    /**
     * @var Category[]
     */
    public $categories = [];

    /**
     * @var string
     */
    public $created_at;

    /**
     * @var string
     */
    public $updated_at;

    public static function create(
        string $code,
        string $name,
        string $url,
        float $net_price,
        float $gross_price,
        array $categories,
        ?string $description = null,
        ?string $image = null
    ): self {
        $product = new self();
        $product->code = $code;
        $product->name = $name;
        $product->url = $url;
        $product->net_price = $net_price;
        $product->gross_price = $gross_price;
        $product->categories = $categories;
        $product->description = $description;
        $product->image = $image;
        return $product;
    }
}