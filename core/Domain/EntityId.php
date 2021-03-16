<?php


namespace Acme\Domain;


class EntityId
{
    public function __construct(private int $id)
    {
    }

    public function value(): int
    {
        return $this->id;
    }
}
