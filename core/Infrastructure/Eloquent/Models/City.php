<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace Acme\Infrastructure\Eloquent\Models;

use Acme\Infrastructure\Eloquent\Models\Relations\CityRelations;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * @package Acme\Infrastructure\Eloquent\Models
 *
 * @property string name
 * @mixin Eloquent
 */
class City extends Model
{
    use HasFactory, CityRelations;

    protected $fillable = [
        'name'
    ];
}
