<?php


namespace Tests\Unit\Domain;


use Acme\Domain\Email;
use Acme\Domain\Exceptions\IncorrectEmailFormatException;
use Acme\Domain\Exceptions\InvalidArgumentException;
use Tests\DomainTestCase;

class EmailTest extends DomainTestCase
{

    /** @test */
    public function shouldReturnAnEmailInstance()
    {
        $email = new Email("user@user.com");

        $this->assertInstanceOf(Email::class, $email);
        $this->assertEquals('user@user.com', $email->value());
    }

    /** @test */
    public function shouldReturnIncorrectEmailFormatException()
    {
        $this->expectException(IncorrectEmailFormatException::class);

        new Email("user");
    }

    /** @test */
    public function shouldReturnInvalidArgumentExceptionForEmptyValue()
    {
        $this->expectException(InvalidArgumentException::class);

        new Email("");
    }
}
