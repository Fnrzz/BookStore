<?php

namespace Database\Seeders;


use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'category_id' => 1,
            'title' => 'Book 1',
            'slug' => 'book-1',
            'price' => 500000,
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus odio officiis hic quae veniam cupiditate reprehenderit vel eligendi obcaecati possimus tempora aperiam expedita, facere saepe vitae ipsum natus velit. A.'
        ]);
        Product::create([
            'category_id' => 2,
            'title' => 'Book 2',
            'slug' => 'book-2',
            'price' => 400000,
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus odio officiis hic quae veniam cupiditate reprehenderit vel eligendi obcaecati possimus tempora aperiam expedita, facere saepe vitae ipsum natus velit. A.'
        ]);
        Product::create([
            'category_id' => 3,
            'title' => 'Book 3',
            'slug' => 'book-3',
            'price' => 250000,
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus odio officiis hic quae veniam cupiditate reprehenderit vel eligendi obcaecati possimus tempora aperiam expedita, facere saepe vitae ipsum natus velit. A.'
        ]);
        Product::create([
            'category_id' => 1,
            'title' => 'Book 4',
            'slug' => 'book-4',
            'price' => 500000,
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus odio officiis hic quae veniam cupiditate reprehenderit vel eligendi obcaecati possimus tempora aperiam expedita, facere saepe vitae ipsum natus velit. A.'
        ]);
    }
}
