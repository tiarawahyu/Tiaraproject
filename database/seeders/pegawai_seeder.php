<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class pegawai_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('_pegawai')->insert([
            'nip' => '123321123',
            'nama' => 'Tiara',
            'email' => 'user1@gmail.com',
            'gender' => '1',
            'jabatan' => 'Kepala Bidang',
            'unit_kerja' => 'Egov',
            'pendidikan' => 'S1 Informatika',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
