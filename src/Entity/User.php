<?php

namespace App\Entity;

use App\Entity\Traits\FirstNameTrait;
use App\Entity\Traits\LastNameTrait;
use App\Entity\Traits\TimestampableTrait;
use App\Entity\Traits\UserTrait;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
#[UniqueEntity('email', message: 'E-mail address already exists.', errorPath: 'email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    use UserTrait;
    use FirstNameTrait;
    use LastNameTrait;
    use TimestampableTrait;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="users")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private ?Client $client = null;

    public function __construct()
    {
        $this->roles = ['ROLE_USER'];
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }
}
