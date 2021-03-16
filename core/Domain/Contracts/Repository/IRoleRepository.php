<?php

namespace Acme\Domain\Contracts\Repository;

interface IRoleRepository
{
    /*public function save(RoleEntity $roleEntity): array;*/

    public function findByType(string $type): array;

    /*public function getAll(): array;*/

}
