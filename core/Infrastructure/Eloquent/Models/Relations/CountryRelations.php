<?php

namespace Acme\Infrastructure\Eloquent\Models\Relations;

use Acme\Infrastructure\Eloquent\Models\State;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait CountryRelations
{
    public function states(): HasMany
    {
        return $this->hasMany(State::class);
    }
}
