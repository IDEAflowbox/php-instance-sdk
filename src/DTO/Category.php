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
     * @var string
     */
    protected $readId;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $image;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * Category constructor.
     * @param string $id
     * @param string $readId
     * @param string $name
     * @param string|null $image
     * @param string $url
     * @param \DateTime $createdAt
     * @param \DateTime $updatedAt
     */
    public function __construct(
        string $id,
        string $readId,
        string $name,
        ?string $image,
        string $url,
        \DateTime $createdAt,
        \DateTime $updatedAt
    ) {
        $this->id = $id;
        $this->readId = $readId;
        $this->name = $name;
        $this->image = $image;
        $this->url = $url;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getReadId(): string
    {
        return $this->readId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }
}