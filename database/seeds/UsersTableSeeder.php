<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'mygame',
            'power' => 'all',
            'role' =>  'admin',
            'password' => encrypt('mygame123'),
            'created_at' => '2020-05-28 16:19:51',
            'updated_at' => '2020-05-28 18:19:51'
        ]);
    }
}
