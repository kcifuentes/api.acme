<?php

namespace Acme\Application\Services\Profile;

use Acme\Application\Contracts\Command;

class GetProfilesByTypeCommand implements Command
{
    public function __construct(private int $profile_type_id)
    {
    }

    public function getProfileTypeId(): int
    {
        return $this->profile_type_id;
    }
}
