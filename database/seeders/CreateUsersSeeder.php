<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
               'name'=>'User',
               'email'=>'user@gmail.com',
               'gender'=>'Female',
               'type'=>0,
               'password'=> bcrypt('12345678'),
            ],
            [
               'name'=>'Arman Sharif',
               'email'=>'arman.p2c@gmail.com',
               'gender'=>'Male',
               'type'=>1,
               'password'=> bcrypt('12345678'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
