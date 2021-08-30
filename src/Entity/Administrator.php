<?php

namespace App\Entity;

use App\Entity\Traits\FirstNameTrait;
use App\Entity\Traits\LastNameTrait;
use App\Entity\Traits\TimestampableTrait;
use App\Entity\Traits\UserTrait;
use App\Repository\AdministratorRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=AdministratorRepository::class)
 */
class Administrator implements UserInterface, PasswordAuthenticatedUserInterface
{
    use UserTrait;
    use FirstNameTrait;
    use LastNameTrait;
    use TimestampableTrait;

    public function __construct()
    {
        $this->roles = ['ROLE_ADMIN'];
    }
}
