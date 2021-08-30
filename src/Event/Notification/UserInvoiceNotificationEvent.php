<?php

namespace App\Event\Notification;

use App\Entity\Invoice;
use App\Entity\User;

class UserInvoiceNotificationEvent
{
    public function __construct(
        private User $user,
        private Invoice $invoice
    ) {
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getInvoice(): Invoice
    {
        return $this->invoice;
    }
}
