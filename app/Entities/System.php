<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class System.
 *
 * @package namespace App\Entities;
 */
class System extends Model implements Transformable
{
    use TransformableTrait, HasFactory;

    protected $table= 'systems';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'type',
        'status',
    ];

    public function images()
    {
        return $this->hasMany(Image::class, 'post_id');
    }
}
