<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\Category;

/**
 * Class CategoryBuilder
 *
 * @package Cyberkonsultant
 */
class CategoryBuilder implements CategoryBuilderInterface
{
    /**
     * @var string
     */
    protected $realId;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $image;

    /**
     * @var string
     */
    protected $url;

    /**
     * @param string $realId
     * @return CategoryBuilderInterface
     */
    public function setRealId(string $realId): CategoryBuilderInterface
    {
        $this->realId = $realId;
        return $this;
    }

    /**
     * @param string $name
     * @return CategoryBuilderInterface
     */
    public function setName(string $name): CategoryBuilderInterface
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $image
     * @return CategoryBuilderInterface
     */
    public function setImage(string $image): CategoryBuilderInterface
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @param string $url
     * @return CategoryBuilderInterface
     */
    public function setUrl(string $url): CategoryBuilderInterface
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return Category
     */
    public function getResult(): Category
    {
        return new Category(
            null,
            $this->realId,
            $this->name,
            $this->url,
            $this->image
        );
    }
}