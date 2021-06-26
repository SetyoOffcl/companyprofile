<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    protected $table = 'tb_pricing';

    protected $fillable = [
        'title',
        'price',
        'image',
        'is_default',
    ];

    public function detail()
    {
        return $this->hasMany(DetailPricing::class, 'pricing_id')->orderBy('id','desc');
    }
}
