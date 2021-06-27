<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTags extends Model
{
    use HasFactory;
    
    protected $table = 'tb_blog_tags';

    protected $fillable = [
        'tags_id',
        'blog_id',
    ];
    
    public function tag()
    {
        return $this->belongsTo(Tags::class, 'tags_id','id');
    }
}
