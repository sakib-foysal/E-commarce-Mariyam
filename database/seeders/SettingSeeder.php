<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $all_data = [
            [ 'title'=>'MyCompany', ],
        ];
        foreach ($all_data as $key => $data) { Setting::create($data); }
    }
}
