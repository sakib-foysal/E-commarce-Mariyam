<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $all_data = [
            [ 'name'=>'Piches', ],
            [ 'name'=>'Kilo Gram', ],
            [ 'name'=>'Gram', ],
            [ 'name'=>'Ton', ],
            [ 'name'=>'Litter', ],
            [ 'name'=>'Packet', ],
        ];
    
        foreach ($all_data as $key => $data) { Unit::create($data); }
    }
}
