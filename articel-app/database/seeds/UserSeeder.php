<?php

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
            'name' => 'Super Admin',
            'email' => 'superadmin@mail.com',
            'password' => Hash::make('superadmin123'),
            'role_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Reporter 1',
            'email' => 'reporter1@mail.com',
            'password' => Hash::make('reporter1'),
            'role_id' => 2
        ]);
        DB::table('users')->insert([
            'name' => 'Reporter 2',
            'email' => 'reporter2@mail.com',
            'password' => Hash::make('reporter2'),
            'role_id' => 2
        ]);

        DB::table('users')->insert([
            'name' => 'Editor 1',
            'email' => 'editor1@mail.com',
            'password' => Hash::make('editor'),
            'role_id' => 3
        ]);
    }
}
