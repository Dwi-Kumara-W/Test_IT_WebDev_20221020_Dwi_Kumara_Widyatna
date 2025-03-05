<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => app('hash')->make('admin'),
            ]
        ];

        foreach($data as $value){
            User::insert([
                'name' => $value['name'],
                'email' => $value['email'],
                'password' => $value['password'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
