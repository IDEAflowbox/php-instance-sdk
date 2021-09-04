<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder\RecommendationFrame\Configuration;

use Cyberkonsultant\Builder\RecommendationFrame\ConfigurationBuilderInterface;
use Cyberkonsultant\DTO\RecommendationFrame\Configuration\Text;

/**
 * Interface TextBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface TextBuilderInterface
{
    /**
     * @param string $productContents
     * @return TextBuilderInterface
     */
    public function setProductContents(string $productContents): TextBuilderInterface;

    /**
     * @param string $button
     * @return TextBuilderInterface
     */
    public function setButton(string $button): TextBuilderInterface;

    /**
     * @return Text
     */
    public function getResult(): Text;

    /**
     * @return ConfigurationBuilderInterface
     */
    public function endTextBuilder(): ConfigurationBuilderInterface;
}