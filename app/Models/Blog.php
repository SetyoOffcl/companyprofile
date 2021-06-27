<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    
    protected $table = 'tb_blog';

    protected $fillable = [
        'title',
        'slug',
        'desc',
        'image',
        'category',
    ];

    public function tags()
    {
        return $this->hasMany(BlogTags::class, 'blog_id');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->diffForHumans();
    }
}
