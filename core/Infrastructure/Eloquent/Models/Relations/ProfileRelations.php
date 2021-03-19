<?php

namespace Acme\Infrastructure\Eloquent\Models\Relations;

use Acme\Infrastructure\Eloquent\Models\City;
use Acme\Infrastructure\Eloquent\Models\DocumentType;
use Acme\Infrastructure\Eloquent\Models\ProfileType;
use Acme\Infrastructure\Eloquent\Models\Vehicle;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait ProfileRelations
{
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function documentType(): BelongsTo
    {
        return $this->belongsTo(DocumentType::class);
    }

    public function profileType(): BelongsTo
    {
        return $this->belongsTo(ProfileType::class);
    }

    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }
}
