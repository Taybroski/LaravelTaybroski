<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasSlug;

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

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(30)
            ->doNotGenerateSlugsOnUpdate();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

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
