<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'description','img','post_id',
    ];

    public function Post()
    {
        return $this->belongsToMany(CategoryPosts::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }


}
