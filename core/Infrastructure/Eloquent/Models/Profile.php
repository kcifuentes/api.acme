<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace Acme\Infrastructure\Eloquent\Models;

use Acme\Infrastructure\Eloquent\Models\Relations\ProfileRelations;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Profile
 * @package Acme\Infrastructure\Eloquent\Models
 *
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_names
 * @property string $document_number
 * @property string $address
 * @property string $phone
 *
 * @mixin Eloquent
 */
class Profile extends Model
{
    use HasFactory, ProfileRelations;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_names',
        'document_number',
        'address',
        'phone',
    ];
}
