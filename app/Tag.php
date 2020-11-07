<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * See what articles does this tag include
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
