<?php
declare(strict_types=1);

namespace Cyberkonsultant\Model;

/**
 * Class RecommendationFrame
 *
 * @package Cyberkonsultant\Model
 */
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
     * @var string|null
     */
    public $group_id;

    /**
     * @var string
     */
    public $frame_type;

    /**
     * @var int
     */
    public $number_of_products = 0;

    /**
     * @var string|null
     */
    public $custom_html;

    /**
     * @var string
     */
    public $xpath;

    /**
     * @var array
     */
    public $configuration;

    /**
     * @var string
     */
    public $created_at;

    /**
     * @var string
     */
    public $updated_at;

    public static function create(
        string $name,
        string $xpath,
        string $frame_type,
        int $number_of_products,
        ?string $group_id = null,
        ?string $custom_html = null,
        ?array $configuration = []
    ): self {
        $recommendationFrame = new self();
        $recommendationFrame->name = $name;
        $recommendationFrame->xpath = $xpath;
        $recommendationFrame->frame_type = $frame_type;
        $recommendationFrame->number_of_products = $number_of_products;
        $recommendationFrame->group_id =  $group_id;
        $recommendationFrame->custom_html = $custom_html;
        $recommendationFrame->configuration = $configuration;
        return $recommendationFrame;
    }

    public static function update(
        string $id,
        string $name,
        string $xpath,
        string $frame_type,
        int $number_of_products,
        ?string $group_id = null,
        ?string $custom_html = null,
        ?array $configuration = []
    ): self {
        $recommendationFrame = new self();
        $recommendationFrame->id = $id;
        $recommendationFrame->name = $name;
        $recommendationFrame->xpath = $xpath;
        $recommendationFrame->frame_type = $frame_type;
        $recommendationFrame->number_of_products = $number_of_products;
        $recommendationFrame->group_id =  $group_id;
        $recommendationFrame->custom_html = $custom_html;
        $recommendationFrame->configuration = $configuration;
        return $recommendationFrame;
    }

    public static function createAdvanced(
        string $name,
        string $xpath,
        int $number_of_products,
        string $custom_html,
        ?string $group_id = null
    ) {
        return static::create($name, $xpath, 'advanced', $number_of_products, $group_id, $custom_html);
    }

    public static function createSimple(
        string $name,
        string $xpath,
        int $number_of_products,
        array $configuration = [],
        ?string $group_id = null
    ) {
        return static::create(
            $name,
            $xpath,
            'simple',
            $number_of_products,
            $group_id,
            null,
            $configuration
        );
    }
}