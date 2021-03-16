<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Http\Response;
use Tests\TestCase;

class RegisterUserControllerTest extends TestCase
{
    /** @test */
    public function the_user_should_register(): void
    {
        $this->registerUserHttp(
            name: 'user',
            email: 'user@gestihum.com',
            password: '12345678'
        )->assertJsonStructure([
            'user' => [
                'id',
                'name',
                'email',
            ],
            'token'
        ]);
    }

    /** @test */
    public function the_user_cant_be_register_by_first_name_required(): void
    {
        $response = $this->registerUserHttp(
            email: 'user@user.com',
            password: '123456789'
        )->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)->assertJsonStructure([
            'message',
            'errors' => [
                '*' => [
                    'type',
                    'text',
                ]
            ]
        ]);

        $response = json_decode($response->getContent());
        foreach ($response->errors as $error) {
            $this->assertEquals('name', $error->type);
        }
    }

    /** @test */
    public function the_user_cant_be_register_by_email_required(): void
    {
        $response = $this->registerUserHttp(
            name: 'user',
            password: '123456789'
        )->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)->assertJsonStructure([
            'message',
            'errors' => [
                '*' => [
                    'type',
                    'text',
                ]
            ]
        ]);

        $response = json_decode($response->getContent());
        foreach ($response->errors as $error) {
            $this->assertEquals('email', $error->type);
        }
    }

    /** @test */
    public function the_user_cant_be_register_by_min_password_error(): void
    {
        $response = $this->registerUserHttp(
            name: 'user',
            email: 'user@gestihum.com',
            password: '123'
        )->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    '*' => [
                        'type',
                        'text',
                    ]
                ]
            ]);

        $response = json_decode($response->getContent());
        foreach ($response->errors as $error) {
            $this->assertEquals('password', $error->type);
        }
    }
}
