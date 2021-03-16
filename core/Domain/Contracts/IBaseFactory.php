<?php


namespace Acme\Domain\Contracts;

interface IBaseFactory
{
    public static function create(array $attributes): object;

    public function createFromArray(array $data): array;
}
