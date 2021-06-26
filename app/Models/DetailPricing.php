<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPricing extends Model
{
    use HasFactory;
    
    protected $table = 'tb_detail_pricing';

    protected $fillable = [
        'name',
        'pricing_id',
        'is_default',
    ];
    
    public function pricing()
    {
        return $this->hasMany(Pricing::class, 'pricing_id','id');
    }
}
