<?php
declare(strict_types=1);

namespace Cyberkonsultant\Model;

class Category
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $real_id;

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
    public $url;

    /**
     * @var string
     */
    public $created_at;

    /**
     * @var string
     */
    public $updated_at;

    public static function attach(string $real_id): self
    {
        $category = new self();
        $category->real_id = $real_id;
        return $category;
    }

    public static function create(
        string $real_id,
        string $name,
        string $url,
        ?string $image = null
    ): self {
        $category = new self();
        $category->real_id = $real_id;
        $category->name = $name;
        $category->url = $url;
        $category->image = $image;
        return $category;
    }
}