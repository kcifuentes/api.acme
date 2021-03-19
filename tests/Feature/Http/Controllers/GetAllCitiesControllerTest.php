<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

class GetAllCitiesControllerTest extends TestCase
{
    /** @test */
    public function getAllCities(): void
    {
        $this->getJson(route('cities.get'))
            ->assertOk()
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'state' => [
                        'id',
                        'name',
                        'country' => [
                            'id',
                            'name'
                        ]
                    ]
                ]
            ]);
    }
}
