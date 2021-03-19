<?php

namespace Acme\Domain\Contracts\Repository;

interface IDocumentTypeRepository
{
    public function getDocumentTypeById(int $id): array;

    public function getAllDocumentTypes(): array;
}
