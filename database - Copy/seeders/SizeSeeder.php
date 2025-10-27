<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $all_data = [
            [
               'name'=>'No Size',
               'short_form'=>null,
            ],
            [
               'name'=>'Small',
               'short_form'=>'S',
            ],
            [
               'name'=>'Medium',
               'short_form'=>'M',
            ],
            [
               'name'=>'Large',
               'short_form'=>'L',
            ],
            [
               'name'=>'Extra Large',
               'short_form'=>'XL',
            ],
        ];
    
        foreach ($all_data as $key => $data) { Size::create($data); }
    }
}
