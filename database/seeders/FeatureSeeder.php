<?php

namespace Database\Seeders;


use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feature::create([
            'title' => 'Book Shop',
            'icon'  => 'bi-book',
            'text'  => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique, eaque.'
        ]);
        Feature::create([
            'title' => 'Blog',
            'icon'  => 'bi-file-earmark-text',
            'text'  => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique, eaque.'
        ]);
        Feature::create([
            'title' => 'Fast Shipping',
            'icon'  => 'bi-truck',
            'text'  => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique, eaque.'
        ]);
    }
}
