<?php

namespace App\Validator;

use App\Dto\UserEmailInterface;
use App\Repository\UserRepository;
use InvalidArgumentException;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class UserEmailUniqueValidator extends ConstraintValidator
{
    public function __construct(
        private UserRepository $repository
    ) {
    }

    public function validate($value, Constraint $constraint)
    {
        /* @var $constraint \App\Validator\UserEmailUnique */

        if (!$value instanceof UserEmailInterface) {
            throw new InvalidArgumentException('Validated object must implement '.UserEmailInterface::class);
        }

        if (empty($value->getEmail())) {
            return;
        }

        if (0 !== $this->repository->count(['email' => $value->getEmail()])) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $value->getEmail())
                ->addViolation();
        }
    }
}
