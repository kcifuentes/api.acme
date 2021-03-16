<?php

namespace Acme\Infrastructure\Eloquent\Models\Relations;

use Acme\Infrastructure\Eloquent\Models\State;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait CityRelations
{
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
}
