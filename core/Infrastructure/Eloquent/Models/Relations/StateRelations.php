<?php

namespace Acme\Infrastructure\Eloquent\Models\Relations;

use Acme\Infrastructure\Eloquent\Models\City;
use Acme\Infrastructure\Eloquent\Models\Country;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait StateRelations
{
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
