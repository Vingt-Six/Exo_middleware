<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Marouane',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin@admin.com'),
                'role_id' => 1
            ],
            [
                'name' => 'Alixe',
                'email' => 'alixe@alixe.com',
                'password' => Hash::make('alixe@alixe.com'),
                'role_id' => 1
            ],
            [
                'name' => 'Didier',
                'email' => 'member@member.com',
                'password' => Hash::make('member@member.com'),
                'role_id' => 2
            ],
            [
                'name' => 'Bertrand',
                'email' => 'web@web.com',
                'password' => Hash::make('web@web.com'),
                'role_id' => 4
            ],
        ]);
    }
}
