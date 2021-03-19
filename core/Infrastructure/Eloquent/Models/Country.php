<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace Acme\Infrastructure\Eloquent\Models;

use Acme\Infrastructure\Eloquent\Models\Relations\CountryRelations;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 * @package Acme\Infrastructure\Eloquent\Models
 *
 * @property string $name
 * @property string $iso_code
 * @mixin Eloquent
 */
class Country extends Model
{
    use HasFactory, CountryRelations;

    protected $fillable = [
        'name',
        'iso_code'
    ];
}
