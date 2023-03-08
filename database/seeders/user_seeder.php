<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class user_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('table_users')->insert([
            'username' => 'user1',
            'nama' => 'user1',
            'email' => 'user1@gmail.com',
            'gender' => '1',
            'level' => '1',
            'password' => Hash::make('pasuser1'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
