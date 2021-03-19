<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace Acme\Infrastructure\Eloquent\Models;

use Acme\Infrastructure\Eloquent\Models\Relations\StateRelations;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class State
 * @package Acme\Infrastructure\Eloquent\Models
 *
 * @property string $name
 * @mixin Eloquent
 */
class State extends Model
{
    use HasFactory, StateRelations;

    protected $fillable = [
        'name'
    ];
}
