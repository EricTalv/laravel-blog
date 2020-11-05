<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    public function path()
    {
        return route('articles.show', $this);
    }

<<<<<<< HEAD
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
;    }
=======
    public function user(){
        return $this->belongsTo('App\User');
    }
>>>>>>> 135921e135a9d9d8ea5977bf0a098e7740530d1a
}
