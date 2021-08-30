<?php

namespace App\Entity\Traits;

trait UserTrait
{
    use UuidTrait;
    use PasswordTrait;
    use EmailTrait;
    use RolesTrait;

    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    public function getSalt(): ?string
    {
        return null;
    }

    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }
}
