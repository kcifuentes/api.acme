<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace Acme\Infrastructure\Eloquent\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DocumentType
 * @package Acme\Infrastructure\Eloquent\Models
 *
 * @property string $name
 * @mixin Eloquent
 */
class DocumentType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
}
