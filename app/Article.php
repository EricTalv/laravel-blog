<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Laravelista\Comments\Commentable;


class Article extends Model
{
    use HasFactory, Commentable;

    protected $fillable = ['title', 'excerpt', 'body'];

    /**
     *  Get this articles path
     */
    public function path()
    {
        // return route('articles.show', $this);
        return url("articles/{$this->id}-" . Str::slug($this->title));

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
