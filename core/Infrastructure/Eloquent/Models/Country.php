<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace Acme\Infrastructure\Eloquent\Models;

use Acme\Infrastructure\Eloquent\Models\Relations\CountryRelations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $iso_code
 */
class Country extends Model
{
    use HasFactory, CountryRelations;

    protected $fillable = [
        'name',
        'iso_code'
    ];
}
