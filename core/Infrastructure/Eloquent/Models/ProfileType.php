<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace Acme\Infrastructure\Eloquent\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProfileType
 * @package Acme\Infrastructure\Eloquent\Models
 *
 * @property int    $id
 * @property string $name
 *
 * @mixin Eloquent
 */
class ProfileType extends Model
{
    use HasFactory;

    const PROFILE_TYPE_OWNER = 1;
    const PROFILE_TYPE_DRIVER = 2;

    protected $fillable = [
        'name'
    ];
}
