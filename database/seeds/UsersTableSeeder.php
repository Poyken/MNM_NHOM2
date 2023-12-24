<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array(
                'name' => 'ADMIN',
                'email' => 'admin@email.com',
                'password' => Hash::make('dashboard'),
                'role' => 'admin',
                'status' => 'active'
            ),
            array(
                'name' => 'USER',
                'email' => 'user@email.com',
                'password' => Hash::make('useruser'),
                'role' => 'user',
                'status' => 'active'
            ),
        );

        DB::table('users')->insert($data);
    }
}
