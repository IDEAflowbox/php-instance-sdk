<?php
declare(strict_types=1);

namespace Cyberkonsultant\Model;

class RecommendationFrame
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var array
     */
    public $options;

    /**
     * @var string
     */
    public $created_at;

    /**
     * @var string
     */
    public $updated_at;

    public static function create(string $name, array $options): self
    {
        $recommendationFrame = new self();
        $recommendationFrame->name = $name;
        $recommendationFrame->options = $options;
        return $recommendationFrame;
    }
}