<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubCategory;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $all_data = [
            [
               'category_id'=>1,
               'name'=>'Fresh Fruit',
            ],
            [
               'category_id'=>1,
               'name'=>'Fresh Vegetables',
            ],
            [
               'category_id'=>1,
               'name'=>'Dry Fruits & Vegetables',
            ],
            
            [
               'category_id'=>2,
               'name'=>'Fresh Water',
            ],
            [
               'category_id'=>2,
               'name'=>'Sea',
            ],
            
            [
               'category_id'=>3,
               'name'=>'Women',
            ],
            [
               'category_id'=>3,
               'name'=>'Men',
            ],
            [
               'category_id'=>3,
               'name'=>'Kids',
            ],
            [
               'category_id'=>3,
               'name'=>'Winter',
            ],
        ];
    
        foreach ($all_data as $key => $data) { SubCategory::create($data); }
    }
}
