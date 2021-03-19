<?php

namespace Acme\Application\Services\DocumentType;

use Acme\Application\Contracts\Command;
use Acme\Application\Contracts\Handler;
use Acme\Domain\Profile\DocumentTypeEntity;
use Acme\Domain\Profile\DocumentTypeFactory;
use Acme\Infrastructure\Eloquent\Repositories\DocumentTypeRepository;

class GetDocumentTypeByIdHandler implements Handler
{
    public function __construct(private DocumentTypeRepository $documentTypeRepository)
    {
    }

    public function __invoke(Command|GetDocumentTypeByIdCommand $command): DocumentTypeEntity|array
    {
        return DocumentTypeFactory::create(
            $this->documentTypeRepository->getDocumentTypeById($command->getId())
        );
    }
}
