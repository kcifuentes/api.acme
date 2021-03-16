<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

class RoutesControllerTest extends TestCase
{
    /** @test */
    public function list_all_initial_data(): void
    {
        $this->getJson(route('initial.data'))
            ->assertOk()
            ->assertJsonStructure([
                '*' => [
                    'name',
                    'uri'
                ]
            ]);
    }
}
