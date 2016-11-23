<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sample category
        $shoes = Category::create(['title' => 'Shoes']);
        $shoes->childs()->saveMany([
            new Category(['title' => 'Lifestyle']),
            new Category(['title' => 'Running']),
            new Category(['title' => 'Basketball']),
            new Category(['title' => 'Football'])
        ]);

        $clothing = Category::create(['title' => 'Clothing']);
        $clothing->childs()->saveMany([
            new Category(['title' => 'Jackets']),
            new Category(['title' => 'Hoodies']),
            new Category(['title' => 'Vests']),
        ]);

        // sample product
        $running = Category::where('title', 'Running')->first();
        $running1 = new \App\Models\Product([
			'photo' => 'shoes1.jpeg',
			'title' => 'Nike Air Walk',
			'model' => 'Men\'s Shoe',
			'stock' => 15,
			'size' => 'S, M, L',
			'description' => 'Best Drop Dead Logos',
			'price' => 122,
			'reduce_price' => 110
		]);
        $running2 = new \App\Models\Product([
			'photo' => 'hodie1.jpg',
			'title' => 'Drop Dead Hodie',
			'model' => 'Men\'s Shoe',
			'stock' => 15,
			'size' => 'S, M, L',
			'description' => 'Best Drop Dead Logos',
			'price' => 122,
			'reduce_price' => 102
		]);
        $running3 = new \App\Models\Product([
			'photo' => 'sample1.jpeg',
			'title' => 'Wekereit',
			'model' => 'Men\'s T-shirt',
			'stock' => 15,
			'size' => 'S, M, L',
			'description' => 'Best Drop Dead Logos',
			'price' => 122,
			'reduce_price' => 120
		]);
        $running->products()->saveMany([$running1, $running2, $running3]);
		
        $jacket = Category::where('title', 'Jackets')->first();
        $jacket1 = new \App\Models\Product([
			'photo' => 'shoes1.jpeg',
			'title' => 'Nike',
			'model' => 'Women\'s Shoe',
			'stock' => 15,
			'size' => 'S, M, L',
			'description' => 'Best Drop Dead Logos',
			'price' => 122,
			'reduce_price' => 111
		]);
        $jacket2 = new \App\Models\Product([
			'photo' => 'shoes1.jpeg',
			'title' => 'Nike Air',
			'model' => 'Women\'s Shoe',
			'stock' => 15,
			'size' => 'S, M, L',
			'description' => 'Best Drop Dead Logos',
			'price' => 122,
			'reduce_price' => 112
		]);        
		$jacket->products()->saveMany([$jacket1, $jacket2]);
    }
}
