<?php

namespace Acme\Domain\Contracts\Repository;

interface IProfileRepository
{
    public function createNewProfile(array $data): array;

    public function getProfilesByType(int $profile_type_id): array;
}
