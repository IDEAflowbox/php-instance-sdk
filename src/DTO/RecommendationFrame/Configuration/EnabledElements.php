<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO\RecommendationFrame\Configuration;

/**
 * Class EnabledElements
 *
 * @package Cyberkonsultant
 */
class EnabledElements
{
    /**
     * @var bool
     */
    protected $thumbnail;

    /**
     * @var bool
     */
    protected $button;

    /**
     * @var bool
     */
    protected $contents;

    /**
     * EnabledElements constructor.
     * @param bool $thumbnail
     * @param bool $button
     * @param bool $contents
     */
    public function __construct(bool $thumbnail, bool $button, bool $contents)
    {
        $this->thumbnail = $thumbnail;
        $this->button = $button;
        $this->contents = $contents;
    }

    /**
     * @return bool
     */
    public function isThumbnail(): bool
    {
        return $this->thumbnail;
    }

    /**
     * @return bool
     */
    public function isButton(): bool
    {
        return $this->button;
    }

    /**
     * @return bool
     */
    public function isContents(): bool
    {
        return $this->contents;
    }
}