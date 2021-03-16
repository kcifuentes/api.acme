<?php

namespace Acme\Domain;

use Acme\Domain\Traits\Serializable;
use Acme\Domain\Traits\Validation;

class BaseEntity
{
    use Validation, Serializable;
}
