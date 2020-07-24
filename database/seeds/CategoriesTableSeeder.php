<?php
use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'iPhone';
        $category->save();

        $category = new Category();
        $category->name = 'Samsung';
        $category->save();

        $category = new Category();
        $category->name = 'LG';
        $category->save();

        $category = new Category();
        $category->name = 'HTC';
        $category->save();

        $category = new Category();
        $category->name = 'Bphone';
        $category->save();
    }
}
