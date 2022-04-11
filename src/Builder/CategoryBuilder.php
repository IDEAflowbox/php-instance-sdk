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
    protected $id;

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
     * @param string $id
     * @return CategoryBuilderInterface
     */
    public function setId(string $id): CategoryBuilderInterface
    {
        $this->id = $id;
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
        $category = new Category();
        $category->setId($this->id);
        $category->setName($this->name);
        $category->setUrl($this->url);
        $category->setImage($this->image);
        return $category;
    }
}