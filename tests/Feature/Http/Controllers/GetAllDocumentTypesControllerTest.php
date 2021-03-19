<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

class GetAllDocumentTypesControllerTest extends TestCase
{
    /** @test */
    public function get_all_document_types_throw_http_request(): void
    {
        $this->getJson(route('documentType.get'))
            ->assertOk()
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name'
                ]
            ]);
    }
}
