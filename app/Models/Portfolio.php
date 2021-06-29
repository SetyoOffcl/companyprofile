<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'tb_portfolio';

    protected $fillable = [
        'image',
        'title',
        'category',
        'desc'
    ];
}
