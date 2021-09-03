<?php
declare(strict_types=1);

namespace Cyberkonsultant\DTO;

/**
 * Class Category
 *
 * @package Cyberkonsultant
 */
class Category
{
    /**
     * @var string|null
     */
    protected $id;

    /**
     * @var string
     */
    protected $realId;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $image;

    /**
     * @var string|null
     */
    protected $url;

    /**
     * Category constructor.
     * @param string|null $id
     * @param string $realId
     * @param string|null $name
     * @param string|null $url
     * @param string|null $image
     */
    public function __construct(
        ?string $id,
        string $realId,
        ?string $name,
        ?string $url,
        ?string $image
    ) {
        $this->id = $id;
        $this->realId = $realId;
        $this->name = $name;
        $this->image = $image;
        $this->url = $url;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getRealId(): string
    {
        return $this->realId;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string $realId
     */
    public function setRealId(string $realId): void
    {
        $this->realId = $realId;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string|null $image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
}