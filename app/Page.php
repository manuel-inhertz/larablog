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

    // Compile Editor Json into plain HTML
    public function getContent()
    {
        $content = json_decode($this->content, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            $output = '';
            foreach ($content['blocks'] as $key => $block) {
                switch ($block['type']) {
                    case 'header':
                        $output .= '<h' . $block['data']['level'] . '>' . $block['data']['text'] . '</h' . $block['data']['level'] . '>';
                        break;
                    case 'paragraph':
                        $output .= '<p>' . $block['data']['text'] . '</p>';
                        break;
                    case 'delimiter':
                        $output .= '<hr>';
                        break;

                }
            }
            return $output;
        }
        return $this->content;
    }

    // GET SHORT CONTENT
    public function getShortContent()
    {
        return strip_tags(Str::words($this->getContent(), 10, '...'));
    }

    // GET POST FEATURED IMAGE
    public function getFeaturedImageUrl()
    {
        return '/storage/'. $this->image;
    }
}
