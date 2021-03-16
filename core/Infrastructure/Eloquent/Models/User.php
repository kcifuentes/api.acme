<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace Acme\Infrastructure\Eloquent\Models;

use Acme\Infrastructure\Eloquent\Models\Relations\UserRelations;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * @property string $name
 * @property string $email
 * @property string $password
 * @mixin Eloquent
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, UserRelations, SoftDeletes, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
