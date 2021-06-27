<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\Tags;
use Illuminate\Database\Seeder;

class BlogCateroySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tags::create([
            'name' => 'App',
        ]);
        Tags::create([
            'name' => 'IT',
        ]);
        Tags::create([
            'name' => 'TIPS',
        ]);
        Tags::create([
            'name' => 'MARKETING',
        ]);
        Tags::create([
            'name' => 'TRAVEL',
        ]);

        BlogCategory::create([
            'name' => 'design'
        ]);
        BlogCategory::create([
            'name' => 'travel'
        ]);
        BlogCategory::create([
            'name' => 'web'
        ]);
        BlogCategory::create([
            'name' => 'food'
        ]);
        BlogCategory::create([
            'name' => 'education'
        ]);
    }
}
