<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

trait PasswordTrait
{
    /**
     * @ORM\Column(type="string")
     */
    private ?string $password = null;

    #[SerializedName(serializedName: 'password')]
    #[Assert\NotBlank(groups: ['create_password'])]
    #[Assert\Length(min: 8, groups: ['Default', 'create_password'])]
    #[Assert\NotCompromisedPassword(groups: ['Default', 'create_password'])]
    private ?string $plainPassword = null;

    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
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
