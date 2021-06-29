<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'tb_company';

    protected $fillable = [
        'title',
        'home_title',
        'home_desc',
        'home_image',
        'about',
        'about_image',
        'client',
        'project',
        'support',
        'employee',
        'service_title',
        'service_desc',
        'pricing_title',
        'pricing_desc',
        'portfolio_title',
        'portfolio_desc',
        'testimonial_title',
        'testimonial_desc',
        'team_title',
        'team_desc',
        'client_title',
        'client_desc',
        'blog_title',
        'blog_desc',
        'faq_title',
        'faq_desc',
        'contact_title',
        'contact_desc',
        'image',
        'thumbnail',
    ];
}
