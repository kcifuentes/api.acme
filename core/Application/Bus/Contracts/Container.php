<?php

namespace Acme\Application\Bus\Contracts;

interface Container
{
    public function make($class): object;
}
