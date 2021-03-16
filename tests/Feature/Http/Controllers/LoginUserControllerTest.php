<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

class LoginUserControllerTest extends TestCase
{
    /** @test */
    public function the_candidate_should_login(): void
    {
        $response = $this->registerUserHttp(
            name: 'user',
            email: 'user@gestihum.com',
            password: '12345678'
        );

        $authData = json_decode($response->getContent());
        $this->postJson(route(name: 'auth.login'), [
            'email'    => $authData->user->email,
            'password' => '12345678'
        ])->assertJsonStructure([
            'user' => [
                'id',
                'name',
                'email'
            ],
            'token'
        ]);
    }

    /** @test */
    public function the_candidate_cant_be_register_by_email_is_required(): void
    {
        $responseData = $this->postJson(route(name: 'auth.login'), [
            'password' => '12345678'
        ])->assertJsonStructure([
            'message',
            'errors' => [
                '*' => [
                    'type',
                    'text'
                ]
            ]
        ]);

        $responseData = json_decode($responseData->getContent());
        foreach ($responseData->errors as $error) {
            $this->assertEquals('email', $error->type);
            $this->assertEquals(
                trans('validation.required', ['attribute' => 'Correo Electrónico']),
                $error->text,
            );
        }
    }

    /** @test */
    public function the_candidate_cant_be_register_by_email_format_invalid(): void
    {
        $responseData = $this->postJson(route(name: 'auth.login'), [
            'email' => 'useruser.com',
            'password' => '13456789'
        ])->assertJsonStructure([
            'message',
            'errors' => [
                '*' => [
                    'type',
                    'text'
                ]
            ]
        ]);

        $responseData = json_decode($responseData->getContent());
        foreach ($responseData->errors as $error) {
            $this->assertEquals('email', $error->type);
            $this->assertEquals(
                trans('validation.email', ['attribute' => 'Correo Electrónico']),
                $error->text,
            );
        }
    }

    /** @test */
    public function the_candidate_cant_be_register_by_email_is_invalid(): void
    {
        $responseData = $this->postJson(route(name: 'auth.login'), [
            'email' => 'user@user.com',
            'password' => '13456789'
        ])->assertJsonStructure([
            'message',
            'errors' => [
                '*' => [
                    'type',
                    'text'
                ]
            ]
        ]);

        $responseData = json_decode($responseData->getContent());
        foreach ($responseData->errors as $error) {
            $this->assertEquals('email', $error->type);
            $this->assertEquals(
                trans('validation.exists', ['attribute' => 'Correo Electrónico']),
                $error->text,
            );
        }
    }
}
