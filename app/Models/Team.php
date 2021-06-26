<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    
    protected $table = 'tb_team';

    protected $fillable = [
        'name',
        'job',
        'image',
        'desc',
    ];
}
