<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $all_data = [
            [
               'name'=>'No Brand',
               'image'=>null,
            ],
            [
               'name'=>'Easy',
               'image'=>null,
            ],
            [
               'name'=>'Nogorbaoul',
               'image'=>null,
            ],
            [
               'name'=>'Arong',
               'image'=>null,
            ],
            [
               'name'=>'Lereve',
               'image'=>null,
            ],
            [
               'name'=>'Ecstasy',
               'image'=>null,
            ],
            [
               'name'=>'Raimond',
               'image'=>null,
            ],
        ];
    
        foreach ($all_data as $key => $data) { Brand::create($data); }
    }
}
