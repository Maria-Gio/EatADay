<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'Alberto1',
            'email' => 'galipienso1@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'mailToken'=>'Z2FsaXBlbnNvMUBnbWFpbC5jb20=',
            'verified'=>true,
            'role_id' => '1'

        ]);

        DB::table('users')->insert([
            'name' => 'Gio1',
            'email' => 'mariagio1@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'mailToken'=>'bWFyaWFnaW8xQGdtYWlsLmNvbQ==',
            'verified'=>false,
            'role_id' => '2'

        ]);
    }
}
