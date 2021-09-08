<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
#[\Attribute] class UserEmailUnique extends Constraint
{
    public $message = 'User email "{{ value }}" already exists.';

    public function getTargets(): array | string
    {
        return self::CLASS_CONSTRAINT;
    }
}
