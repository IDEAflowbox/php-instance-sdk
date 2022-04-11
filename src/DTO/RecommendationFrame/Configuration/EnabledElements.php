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

    /**
     * @param bool $thumbnail
     */
    public function setThumbnail(bool $thumbnail): void
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @param bool $button
     */
    public function setButton(bool $button): void
    {
        $this->button = $button;
    }

    /**
     * @param bool $contents
     */
    public function setContents(bool $contents): void
    {
        $this->contents = $contents;
    }
}