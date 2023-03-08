<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Traits\TransformableTrait;

class Banner extends Model
{
    use TransformableTrait, HasFactory;

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
