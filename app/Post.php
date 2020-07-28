<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Post extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'thumbnail', 'excerpt', 'content', 'status', 'author', 'published_at',
    ];

    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug)->firstOrFail();
    }
}
