<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\EnabledElements;

/**
 * Interface EnabledElementsBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface EnabledElementsBuilderInterface
{
    /**
     * @param bool $image
     * @return EnabledElementsBuilderInterface
     */
    public function setImage(bool $image): EnabledElementsBuilderInterface;

    /**
     * @param bool $productName
     * @return EnabledElementsBuilderInterface
     */
    public function setProductName(bool $productName): EnabledElementsBuilderInterface;

    /**
     * @param bool $price
     * @return EnabledElementsBuilderInterface
     */
    public function setPrice(bool $price): EnabledElementsBuilderInterface;

    /**
     * @param bool $button
     * @return EnabledElementsBuilderInterface
     */
    public function setButton(bool $button): EnabledElementsBuilderInterface;

    /**
     * @return EnabledElements
     */
    public function getResult(): EnabledElements;

    /**
     * @return ConfigurationBuilderInterface
     */
    public function endEnabledElementsBuilder(): ConfigurationBuilderInterface;
}