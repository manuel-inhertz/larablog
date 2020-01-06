<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];
   
    /**
     * The belongs To Relationship
     *
     * @var array
     */

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    // GET SHORT CONTENT
    public function getShortContent()
    {
        return strip_tags(Str::words($this->content, 10, '...'));
    }

    // GET POST FEATURED IMAGE
    public function getFeaturedImageUrl()
    {
        return '/storage/'. $this->image;
    }
}
