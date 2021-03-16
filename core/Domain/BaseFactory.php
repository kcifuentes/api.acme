<?php


namespace Acme\Domain;

use Acme\Domain\Contracts\IBaseFactory;

abstract class BaseFactory implements IBaseFactory
{
    abstract static function create(array $attributes): object;

    public function createFromArray(array $data): array
    {
        $arrayData = [];

        foreach ($data as $datum) {
            array_push($arrayData, $this->create($datum));
        }

        return $arrayData;
    }
}
