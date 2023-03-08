<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Categories extends Model implements Transformable
{
    use TransformableTrait, HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
    ];

    public function children()
    {
        return $this->hasMany(Categories::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Categories::class);
    }

    public function allLevelChildren()
    {
        return $this->hasMany(Categories::class, 'parent_id')->where('has_child', 1);
    }

    public function allLevelChildrenWithSubChild()
    {
        return $this->hasMany(Categories::class, 'parent_id')->select('*')->with('allLevelChildrenWithSubChild');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function post()
    {
        return $this->hasMany(Post::class, 'category_id');
    }
}
