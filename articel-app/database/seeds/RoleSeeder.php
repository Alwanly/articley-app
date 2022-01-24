<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role' => 'admin',
            'role_name' => 'Super Admin',
            'description' => 'Admin besar'
        ]);

        DB::table('roles')->insert([
            'role' => 'repoter',
            'role_name' => 'Reporter',
            'description' => 'Write Article'
        ]);

        DB::table('roles')->insert([
            'role' => 'editor',
            'role_name' => 'Editor',
            'description' => 'Edit Article'
        ]);
    }
}
