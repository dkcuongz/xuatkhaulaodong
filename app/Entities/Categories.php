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

    public function scopeHasPost()
    {
        return $this->where('has_post', 1);
    }

    public function parent()
    {
        return $this->belongsTo(Categories::class);
    }

    public function allLevelChildren()
    {
        return $this->hasMany(Categories::class, 'parent_id')->where('parent_id', 0);
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

    public function scopeIsChild()
    {
        return $this->where('parent_id', '!=', 0);
    }

    public function scopeHasChild()
    {
        return $this->where('has_child', 1);
    }
}
