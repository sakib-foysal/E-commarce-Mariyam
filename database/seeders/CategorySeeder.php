<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $all_data = [
            [
               'name'=>'Fruits & Vegetables',
               'image'=>null,
            ],
            [
               'name'=>'Fish',
               'image'=>null,
            ],
            [
               'name'=>'Fashion / Life Style',
               'image'=>null,
            ],
        ];
    
        foreach ($all_data as $key => $data) { Category::create($data); }
    }
}
