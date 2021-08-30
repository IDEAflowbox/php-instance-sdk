<?php

namespace App\Security\Voter;

use App\Entity\Invoice;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class InvoiceVoter extends Voter
{
    public const INVOICE_VIEW = 'INVOICE_VIEW';
    public const INVOICE_DOWNLOAD = 'INVOICE_DOWNLOAD';

    protected function supports(string $attribute, $subject): bool
    {
        return in_array($attribute, [self::INVOICE_VIEW, self::INVOICE_DOWNLOAD])
            && $subject instanceof Invoice;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        if (!$user instanceof UserInterface) {
            return false;
        }

        return match ($attribute) {
            self::INVOICE_VIEW, self::INVOICE_DOWNLOAD => $user instanceof User &&
                $subject instanceof Invoice &&
                $user->getClient() === $subject->getClient()
        };
    }
}
