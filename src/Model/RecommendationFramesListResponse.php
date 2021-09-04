<?php
declare(strict_types=1);

namespace Cyberkonsultant\Model;

use Cyberkonsultant\DTO\RecommendationFrame;

/**
 * Interface RecommendationFramesListResponse
 *
 * @package Cyberkonsultant
 */
interface RecommendationFramesListResponse extends ListResponse
{
    /**
     * @return RecommendationFrame[]
     */
    public function getData(): array;
}