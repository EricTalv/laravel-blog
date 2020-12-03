<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'excerpt', 'body'];

    /**
     *  Get the this articles path
     */
    public function path()
    {
        return route('articles.show', $this);
    }

    /**
     *  See who this article belongs to
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     *  See all tags this article has
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();

    }

    public function tagsOnlyName()
    {
        return $this->belongsToMany(Tag::class)->pluck('name');

    }



}
