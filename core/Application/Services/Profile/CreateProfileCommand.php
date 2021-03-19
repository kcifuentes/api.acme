<?php

namespace Acme\Application\Services\Profile;

use Acme\Application\Contracts\Command;
use Acme\Domain\Traits\Serializable;

class CreateProfileCommand implements Command
{
    use Serializable;

    public function __construct(
        private string $first_name,
        private string $middle_name,
        private string $last_names,
        private int $document_type_id,
        private string $document_number,
        private string $address,
        private string $phone,
        private int $city_id,
        private int $profile_type_id,
    )
    {
    }
}
