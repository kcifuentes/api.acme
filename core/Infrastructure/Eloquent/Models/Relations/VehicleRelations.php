<?php

namespace Acme\Infrastructure\Eloquent\Models\Relations;

use Acme\Infrastructure\Eloquent\Models\Profile;
use Acme\Infrastructure\Eloquent\Models\ProfileType;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait VehicleRelations
{
    public function owner(): BelongsTo
    {
        return $this->belongsTo(Profile::class)
            ->where('profile_type_id', '=', ProfileType::PROFILE_TYPE_OWNER);
    }
}
