<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace Acme\Domain\Exceptions;

use DomainException;

class InvalidArgumentException extends DomainException
{
    protected $code = 422;
}
