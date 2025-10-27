<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $all_data = [
            
            [
               'type'=>'Import',
               'sub_category_id'=>'1',
               'title'=>'Currant Fruit',
               'slug'=>'currant-fruit',
               'image'=>null,
               'image_hover'=>null,
               'sale_price'=>'500',
               'min_quantity'=>'50',
               'unit_id'=>'2',
            ],
            [
               'type'=>'Import',
               'sub_category_id'=>'2',
               'title'=>'Tomato',
               'slug'=>'tomato',
               'image'=>null,
               'image_hover'=>null,
               'sale_price'=>'200',
               'min_quantity'=>'50',
               'unit_id'=>'2',
            ],
            [
               'type'=>'Import',
               'sub_category_id'=>'2',
               'title'=>'Chilli',
               'slug'=>'chilli',
               'image'=>null,
               'image_hover'=>null,
               'sale_price'=>'150',
               'min_quantity'=>'50',
               'unit_id'=>'2',
            ],
            [
               'type'=>'Import',
               'sub_category_id'=>'1',
               'title'=>'Corn',
               'slug'=>'corn',
               'image'=>null,
               'image_hover'=>null,
               'sale_price'=>'300',
               'min_quantity'=>'50',
               'unit_id'=>'2',
            ],
            [
               'type'=>'Import',
               'sub_category_id'=>'1',
               'title'=>'Mango',
               'slug'=>'mango',
               'image'=>null,
               'image_hover'=>null,
               'sale_price'=>'800',
               'min_quantity'=>'50',
               'unit_id'=>'2',
            ],
            
            [
               'type'=>'Trade',
               'sub_category_id'=>'1',
               'title'=>'Currant Fruit',
               'slug'=>'currant-fruit',
               'image'=>null,
               'image_hover'=>null,
               'sale_price'=>'500',
               'min_quantity'=>'50',
               'unit_id'=>'2',
            ],
            [
               'type'=>'Trade',
               'sub_category_id'=>'4',
               'title'=>'Hilsa Fish',
               'slug'=>'hilsa-fish',
               'image'=>null,
               'image_hover'=>null,
               'sale_price'=>'2000',
               'min_quantity'=>'30',
               'unit_id'=>'1',
            ],
            [
               'type'=>'Trade',
               'sub_category_id'=>'2',
               'title'=>'Chilli',
               'slug'=>'chilli',
               'image'=>null,
               'image_hover'=>null,
               'sale_price'=>'150',
               'min_quantity'=>'50',
               'unit_id'=>'2',
            ],
            [
               'type'=>'Trade',
               'sub_category_id'=>'1',
               'title'=>'Corn',
               'slug'=>'corn',
               'image'=>null,
               'image_hover'=>null,
               'sale_price'=>'300',
               'min_quantity'=>'50',
               'unit_id'=>'2',
            ],
            [
               'type'=>'Trade',
               'sub_category_id'=>'4',
               'title'=>'Shrimp Fish',
               'slug'=>'shrimp-fish',
               'image'=>null,
               'image_hover'=>null,
               'sale_price'=>'1500',
               'min_quantity'=>'20',
               'unit_id'=>'2',
            ],
            
            [
               'type'=>'Export',
               'sub_category_id'=>'7',
               'title'=>'Casual T-Shirt',
               'slug'=>'casual-t-shirt',
               'image'=>null,
               'image_hover'=>null,
               'sale_price'=>'1500',
               'min_quantity'=>'10',
               'unit_id'=>'1',
            ],
            [
               'type'=>'Export',
               'sub_category_id'=>'2',
               'title'=>'Tomato',
               'slug'=>'tomato',
               'image'=>null,
               'image_hover'=>null,
               'sale_price'=>'200',
               'min_quantity'=>'50',
               'unit_id'=>'2',
            ],
            [
               'type'=>'Export',
               'sub_category_id'=>'2',
               'title'=>'Chilli',
               'slug'=>'chilli',
               'image'=>null,
               'image_hover'=>null,
               'sale_price'=>'150',
               'min_quantity'=>'50',
               'unit_id'=>'2',
            ],
            [
               'type'=>'Export',
               'sub_category_id'=>'1',
               'title'=>'Corn',
               'slug'=>'corn',
               'image'=>null,
               'image_hover'=>null,
               'sale_price'=>'300',
               'min_quantity'=>'50',
               'unit_id'=>'2',
            ],
            [
               'type'=>'Export',
               'sub_category_id'=>'1',
               'title'=>'Mango',
               'slug'=>'mango',
               'image'=>null,
               'image_hover'=>null,
               'sale_price'=>'800',
               'min_quantity'=>'50',
               'unit_id'=>'2',
            ],
            
            
        ];
    
        foreach ($all_data as $key => $data) { Product::create($data); }
    }
}
