<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'Admin',
               'email'=>'admin@demo.com',
               'type'=>'admin',
               'password'=> bcrypt('admin@123'),
            ],
            [
               'name'=>'Manager',
               'email'=>'manager@demo.com',
               'type'=> 'manager',
               'password'=> bcrypt('manager@123'),
            ],
            [
               'name'=>'User',
               'email'=>'user@demo.com',
               'type'=>'user',
               'password'=> bcrypt('user@123'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
