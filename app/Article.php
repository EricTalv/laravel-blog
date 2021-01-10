<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasFactory;

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

    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }





}
