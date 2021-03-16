<?php

namespace Acme\Domain\Traits;

trait Serializable
{
    public function toArray(): array
    {
        $array = get_object_vars($this);
        unset($array['_parent'], $array['_index']);
        array_walk_recursive($array, function (&$property) {
            if (is_object($property) && method_exists($property, 'toArray')) {
                $property = $property->toArray();
            } else if (is_object($property) && method_exists($property, 'value')) {
                $property = $property->value();
            }
        });

        return $array;
    }
}
