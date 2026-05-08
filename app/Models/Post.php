<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'cover',
        'sinopsis',
        'genre',
        'status',
        'is_draft'
    ];

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
