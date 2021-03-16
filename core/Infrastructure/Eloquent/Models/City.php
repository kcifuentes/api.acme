<?php

namespace Acme\Infrastructure\Eloquent\Models;

use Acme\Infrastructure\Eloquent\Models\Relations\CityRelations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory, CityRelations;

    protected $fillable = [
        'name'
    ];
}
