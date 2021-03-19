<?php

namespace Acme\Infrastructure\Eloquent\Models;

use Acme\Domain\Contracts\Repository\IProfileTypeRepository;

class ProfileTypeRepository implements IProfileTypeRepository
{
    public function __construct(private ProfileType $profileTypeModel)
    {
    }

    public function getAllProfileTypes(): array
    {
        return $this->profileTypeModel->all(['id', 'name'])->toArray();
    }
}
