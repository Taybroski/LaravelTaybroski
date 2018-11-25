<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table name
    protected $table = 'posts';
    // Date Format
    // protected $dateFormat = 'Y-m-d H:i';
    //Primary key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true; 
    // Protected attributes
    protected $fillable = ['title', 'body'];
    // // Protected dates, carbon mutator
    // protected $dates = [
    //     'created_at',
    //     'updated_at',
    // ];

    // public function getDateFormat()
    // {
    //     return 'Y-m-d H:i:s.u';
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body, $author)
    {
        Comment::create([
            'body'    => $body,
            'author'  => $author,
            'post_id' => $this->id
        ]);
    }
}
