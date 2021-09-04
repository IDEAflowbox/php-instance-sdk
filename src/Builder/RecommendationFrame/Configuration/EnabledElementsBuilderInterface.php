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
     * @param bool $thumbnail
     * @return EnabledElementsBuilderInterface
     */
    public function setThumbnail(bool $thumbnail): EnabledElementsBuilderInterface;

    /**
     * @param bool $button
     * @return EnabledElementsBuilderInterface
     */
    public function setButton(bool $button): EnabledElementsBuilderInterface;

    /**
     * @param bool $contents
     * @return EnabledElementsBuilderInterface
     */
    public function setContents(bool $contents): EnabledElementsBuilderInterface;

    /**
     * @return EnabledElements
     */
    public function getResult(): EnabledElements;

    /**
     * @return ConfigurationBuilderInterface
     */
    public function endEnabledElementsBuilder(): ConfigurationBuilderInterface;
}