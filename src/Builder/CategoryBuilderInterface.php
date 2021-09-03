<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\Category;

/**
 * Interface CategoryBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface CategoryBuilderInterface
{
    /**
     * @param string $realId
     * @return CategoryBuilderInterface
     */
    public function setRealId(string $realId): CategoryBuilderInterface;

    /**
     * @param string $name
     * @return CategoryBuilderInterface
     */
    public function setName(string $name): CategoryBuilderInterface;

    /**
     * @param string $image
     * @return CategoryBuilderInterface
     */
    public function setImage(string $image): CategoryBuilderInterface;

    /**
     * @param string $url
     * @return CategoryBuilderInterface
     */
    public function setUrl(string $url): CategoryBuilderInterface;

    /**
     * @return Category
     */
    public function getResult(): Category;
}