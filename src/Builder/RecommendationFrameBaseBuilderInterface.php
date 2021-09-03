<?php
declare(strict_types=1);

namespace Cyberkonsultant\Builder;

use Cyberkonsultant\DTO\RecommendationFrame;

/**
 * Interface RecommendationFrameBaseBuilderInterface
 *
 * @package Cyberkonsultant
 */
interface RecommendationFrameBaseBuilderInterface
{
    public function setName(string $name): RecommendationFrameBaseBuilderInterface;
    public function setGroupId(string $groupId): RecommendationFrameBaseBuilderInterface;
    public function setNumberOfProducts(int $numberOfProducts): RecommendationFrameBaseBuilderInterface;
    public function setXPath(string $xpath): RecommendationFrameBaseBuilderInterface;
    public function getResult(): RecommendationFrame;
}