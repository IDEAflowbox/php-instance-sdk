<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait RolesTrait
{
    /**
     * @ORM\Column(type="json")
     */
    private ?array $roles = [];

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
}
