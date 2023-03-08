<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class IntroducePeople.
 *
 * @package namespace App\Entities;
 */
class IntroducePeople extends Model implements Transformable
{
    use TransformableTrait, HasFactory;

    protected $table= 'introduce_peoples';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'url',
        'status',
    ];

    public function image()
    {
        return $this->hasOne(Image::class, 'post_id');
    }
}
