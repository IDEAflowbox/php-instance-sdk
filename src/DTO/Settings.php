<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO;

/**
 * Class Settings
 *
 * @package Cyberkonsultant
 */
class Settings
{
    /**
     * @var string
     */
    protected $metaKey;

    /**
     * @var string|null
     */
    protected $metaValue;

    /**
     * @return string
     */
    public function getMetaKey(): string
    {
        return $this->metaKey;
    }

    /**
     * @param string $metaKey
     */
    public function setMetaKey(string $metaKey): void
    {
        $this->metaKey = $metaKey;
    }

    /**
     * @return string|null
     */
    public function getMetaValue(): ?string
    {
        return $this->metaValue;
    }

    /**
     * @param string|null $metaValue
     */
    public function setMetaValue(?string $metaValue): void
    {
        $this->metaValue = $metaValue;
    }
}