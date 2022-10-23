<?php

namespace App\Domain\Contracts;

use App\Domain\Enum\NotifyType;

interface NotifyInterface
{
    public function sendMessage(NotifyType $type, ?string $message = null): bool;
}
