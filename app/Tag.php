<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Table name
    protected $table = 'tags';

    // Primary key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    // Fillable Attributes
    protected $fillable = ['id', 'name'];

    // Relationships
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
    
}
