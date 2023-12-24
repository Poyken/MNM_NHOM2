<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            'description'=>"--Giới thiệu cửa hàng--.",
            'photo'=>"image.jpg",
            'logo'=>'logo.jpg',
            'address'=>"Bắc Từ Liêm, Hà Nội",
            'email'=>"shoptuixach@email.com",
            'phone'=>"0123456789",
        );
        DB::table('settings')->insert($data);
    }
}
