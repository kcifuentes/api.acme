<?php

namespace Acme\Domain\Contracts\Repository;

interface IProfileTypeRepository
{
    public function getAllProfileTypes(): array;
}
