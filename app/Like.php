<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'status','post_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

   public function Post()
    {
        return $this->belongsTo(Post::class);
    }

    public function Like()
    {
        return $this->belongsTo(Like::class);
    }


}
