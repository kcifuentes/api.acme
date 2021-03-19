<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace Acme\Infrastructure\Eloquent\Models;

use Acme\Infrastructure\Eloquent\Models\Relations\VehicleRelations;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vehicle
 * @package Acme\Infrastructure\Eloquent\Models
 *
 * @property string $plate
 * @property string $color
 * @property string $brand
 *
 * @mixin Eloquent
 */
class Vehicle extends Model
{
    use HasFactory, VehicleRelations;

    protected $fillable = [
        'plate',
        'color',
        'brand',
    ];
}
