<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category = new Category();
        $category->name = "Sports";
        $category->description = "Sports Games";
        $category->active = true;
        $category->save();

        $category2 = new Category();
        $category2->name = "Action";
        $category2->description = "Action Games";
        $category2->active = true;
        $category2->save();

        $category3 = new Category();
        $category3->name = "Adventure";
        $category3->description = "Adventure Games";
        $category3->active = true;
        $category3->save();

        $category4 = new Category();
        $category4->name = "Carrers";
        $category4->description = "Carrers Games";
        $category4->active = true;
        $category4->save();


    }
}
