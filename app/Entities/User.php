<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class User.
 *
 * @package namespace App\Entities;
 */
class User extends Authenticatable implements Transformable
{
    use TransformableTrait, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'email_verified_at',
        'password',
        'status',
    ];

    public function isAdmin()
    {
        return $this->role_id == config('constants.user.roles.admin');
    }

    public function isMaker()
    {
        return $this->role_id == config('constants.user.roles.maker');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }
}
