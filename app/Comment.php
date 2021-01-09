<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{

    protected $fillable = ['body', 'user_id', 'post_id', 'parent_id' ];

    /**
     * The belongs to Relationship
     *
     * @var array
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function replies()
    {
        return null;
    }
}
