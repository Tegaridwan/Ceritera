<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = [
        'post_id',
        'title',
        'content',
        'chapter_number'
    ];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
