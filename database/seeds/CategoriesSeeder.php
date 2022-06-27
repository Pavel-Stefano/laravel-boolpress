<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriesList = ['diesel', 'benzina', 'elettrica', 'ibrida', 'gpl'];

        forEach($categoriesList as $category){
            $newCategory = new Category();
            $newCategory->name = $category;
            $newCategory->slug = Str::of($newCategory->name)->slug("-");

            $newCategory->save();
        }
    }
}
