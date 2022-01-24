<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_publishes')->insert([
            'id'=>0,
            'status'=>'unpublish'
        ]);
        DB::table('status_publishes')->insert([
            'id'=>1,
            'status'=>'publish'
        ]);
    }
}
