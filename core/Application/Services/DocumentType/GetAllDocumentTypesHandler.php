<?php

namespace Acme\Application\Services\DocumentType;

use Acme\Application\Contracts\Command;
use Acme\Application\Contracts\Handler;
use Acme\Domain\BaseEntity;
use Acme\Domain\Profile\DocumentTypeFactory;
use Acme\Infrastructure\Eloquent\Repositories\DocumentTypeRepository;

class GetAllDocumentTypesHandler implements Handler
{
    public function __construct(private DocumentTypeRepository $documentTypeRepository)
    {
    }

    public function __invoke(Command $command): BaseEntity|array
    {
        return (new DocumentTypeFactory)->createFromArray(
            $this->documentTypeRepository->getAllDocumentTypes()
        );
    }
}
