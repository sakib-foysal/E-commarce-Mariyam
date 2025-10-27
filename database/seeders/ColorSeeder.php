<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $all_data = [
            [
               'name'=>'No Color',
               'color_code'=>null,
            ],
            [
               'name'=>'Red',
               'color_code'=>null,
            ],
            [
               'name'=>'Green',
               'color_code'=>null,
            ],
            [
               'name'=>'Blue',
               'color_code'=>null,
            ],
            [
               'name'=>'White',
               'color_code'=>null,
            ],
            [
               'name'=>'Black',
               'color_code'=>null,
            ],
            [
               'name'=>'Pink',
               'color_code'=>null,
            ],
        ];
    
        foreach ($all_data as $key => $data) { Color::create($data); }
    }
}
