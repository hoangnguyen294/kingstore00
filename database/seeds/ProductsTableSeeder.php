<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product;
        $product->name = 'iPhone X';
        $product->image = 'image';
        $product->price = '2000000';
        $product->color = 'red';
        $product->ram = '2gb';
        $product->memory= '32gb';
        $product->promotion = 'phukien' ;
        $product->speciality = 'new';
        $product->description = 'fffafsfasfa';
        $product->warranty = '12thang';
        $product->category_id = '1';
        $product->save();
    }
}
