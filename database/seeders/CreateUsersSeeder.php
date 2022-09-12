<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = [
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'is_admin'=>'1',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'aclaputra',
                'email'=>'acla@gmail.com',
                'is_admin'=>'0',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'myrakarimah',
                'email'=>'myra@gmail.com',
                'is_admin'=>'0',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'alcaumaru',
                'email'=>'alca@gmail.com',
                'is_admin'=>'0',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'yosafat',
                'email'=>'yosafat@gmail.com',
                'is_admin'=>'0',
                'password'=> bcrypt('123456'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
