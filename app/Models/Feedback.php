<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    
    protected $table = 'tb_feedback';

    protected $fillable = [
        'message',
        'subject',
        'name',
        'email'
    ];
}
