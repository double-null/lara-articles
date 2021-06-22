<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Article extends Model
{
    use HasFactory;

    public function getRealtimeViewsAttribute()
    {
        return Redis::get('article:views:'.$this->id) ?? $this->views;
    }

    public function getRealtimeLikesAttribute()
    {
        return Redis::get('article:likes:'.$this->id) ?? $this->likes;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
