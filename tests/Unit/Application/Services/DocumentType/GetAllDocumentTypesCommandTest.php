<?php

namespace Tests\Unit\Application\Services\DocumentType;

use Acme\Application\Services\DocumentType\GetAllDocumentTypesCommand;
use Acme\Domain\Profile\DocumentTypeEntity;

class GetAllDocumentTypesCommandTest extends \Tests\TestCase
{
    /** @test */
    public function should_get_array_document_type_entities(): void
    {
        $documentTypes = $this->commandBus->execute(new GetAllDocumentTypesCommand());

        $this->assertIsArray($documentTypes);

        /** @var DocumentTypeEntity $documentType */
        foreach ($documentTypes as $documentType) {
            $this->instance(DocumentTypeEntity::class, $documentType);
            $this->assertNotNull($documentType->getId());
            $this->assertNotNull($documentType->getName());
        }
    }
}
