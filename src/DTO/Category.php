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
     * @var string
     */
    protected $id;

    /**
     * @var string|null
     */
    protected $name = null;

    /**
     * @var string|null
     */
    protected $image = null;

    /**
     * @var string|null
     */
    protected $url = null;

    /**
     * @var string|null
     */
    protected $associatedTo = null;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
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
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
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

    /**
     * @return string|null
     */
    public function getAssociatedTo(): ?string
    {
        return $this->associatedTo;
    }

    /**
     * @param string|null $associatedTo
     */
    public function setAssociatedTo(?string $associatedTo): void
    {
        $this->associatedTo = $associatedTo;
    }
}