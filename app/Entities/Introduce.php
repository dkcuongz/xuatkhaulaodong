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
class Introduce extends Model implements Transformable
{
    use TransformableTrait, HasFactory;

    protected $table= 'introduces';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'url',
        'status',
    ];

    public function image()
    {
        return $this->hasOne(Image::class, 'introduce_id');
    }
}
