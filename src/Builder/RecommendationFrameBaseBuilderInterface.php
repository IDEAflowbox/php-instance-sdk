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
    public function setName(string $name): void;
    public function setGroupId(string $groupId): void;
    public function setNumberOfProducts(int $numberOfProducts): void;
    public function setXPath(string $xpath): void;
    public function getResult(): RecommendationFrame;
}