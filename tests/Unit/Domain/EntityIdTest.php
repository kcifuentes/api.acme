<?php

namespace Tests\Unit\Domain;

use Acme\Domain\EntityId;
use Tests\DomainTestCase;

class EntityIdTest extends DomainTestCase
{
    /** @test */
    public function shouldBeEntityIdInstance()
    {
        $entityId = new EntityId(1);

        $this->assertEquals(1, $entityId->value());
    }
}
