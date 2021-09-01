<?php

namespace App\Message;

use Symfony\Component\Uid\Uuid;

class CreateInvoice
{
    public function __construct(
        private Uuid $clientId
    ) {
    }

    public function getClientId(): Uuid
    {
        return $this->clientId;
    }
}
