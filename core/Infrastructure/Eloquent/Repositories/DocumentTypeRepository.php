<?php

namespace Acme\Infrastructure\Eloquent\Repositories;

use Acme\Domain\Contracts\Repository\IDocumentTypeRepository;
use Acme\Infrastructure\Eloquent\Models\DocumentType;

class DocumentTypeRepository implements IDocumentTypeRepository
{
    public function __construct(private DocumentType $documentTypeModel)
    {
    }

    public function getDocumentTypeById(int $id): array
    {
        return $this->documentTypeModel->find($id)->toArray();
    }

    public function getAllDocumentTypes(): array
    {
        return $this->documentTypeModel->all(['id', 'name'])->toArray();
    }
}
