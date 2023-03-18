<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('petugas')->insert([
            'id_petugas' => '131131',
            'nama_petugas' => 'reenn',
            'username' => 'admin',
            'password' => Hash::make('123'),
            'level' => 'admin',
            'telp' => '087744652669',
        ]);

        DB::table('petugas')->insert([
            'id_petugas' => '1231',
            'nama_petugas' => 'ridho',
            'username' => 'petugas',
            'password' => Hash::make('123'),
            'level' => 'petugas',
            'telp' => '12345678',
        ]);

        DB::table('masyarakat')->insert([
            'nik' => '327101381',
            'nama' => 'steven',
            'username' => 'masyarakat',
            'password' => Hash::make('123'),
            'telp' => '1231313',
        ]);
    }
}
