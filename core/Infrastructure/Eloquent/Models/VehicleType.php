<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace Acme\Infrastructure\Eloquent\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VehicleType
 * @package Acme\Infrastructure\Eloquent\Models
 *
 * @property string $name
 * @mixin Eloquent
 */
class VehicleType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
}
