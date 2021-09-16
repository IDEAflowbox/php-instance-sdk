<?php

namespace App\Dto;

use Symfony\Component\Security\Core\Validator\Constraints as SecurityAssert;
use Symfony\Component\Validator\Constraints as Assert;

class ChangePasswordDto
{
    #[Assert\NotBlank]
    #[SecurityAssert\UserPassword]
    private ?string $password = null;

    #[Assert\NotBlank]
    #[Assert\Length(min: 8)]
    #[Assert\NotCompromisedPassword]
    private ?string $plainPassword = null;

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(?string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }
}
