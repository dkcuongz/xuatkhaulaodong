<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Post extends Model implements Transformable
{
    use TransformableTrait, HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'status',
        'category_id'
    ];

    public function images()
    {
        return $this->hasMany(Image::class, 'post_id');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
