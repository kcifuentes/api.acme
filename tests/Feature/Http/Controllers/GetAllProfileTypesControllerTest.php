<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Http\Response;
use Tests\TestCase;

class GetAllProfileTypesControllerTest extends TestCase
{
    /** @test */
    public function get_all_profile_types(): void
    {
        $this->getJson(route('profile.types'))
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name'
                ]
            ]);
    }
}
