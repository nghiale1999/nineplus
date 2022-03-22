<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class SeederUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'nghia',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'phone' => Str::random(10),
            'address' => Str::random(10),
            'id_nationality'=>1,
            'id_project'=>1],

            ['name' => 'nghia',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'phone' => Str::random(10),
            'address' => Str::random(10),
            'id_nationality'=>1,
            'id_project'=>1],
            
            ['name' => 'nghia',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'phone' => Str::random(10),
            'address' => Str::random(10),
            'id_nationality'=>1,
            'id_project'=>1]
            
        ]);
    }
}
