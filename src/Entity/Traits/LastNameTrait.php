<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait LastNameTrait
{
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    #[Assert\NotBlank]
    private ?string $lastName = null;

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }
}
