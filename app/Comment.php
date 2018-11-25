<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Table name
    protected $table = 'comments';

    //Primary key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;    

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
}
