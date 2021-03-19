<?php

namespace Acme\Application\Services\DocumentType;

use Acme\Application\Contracts\Command;

class GetDocumentTypeByIdCommand implements Command
{
    public function __construct(private int $id)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }
}
