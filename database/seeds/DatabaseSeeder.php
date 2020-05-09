<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bill_status')->insert([
            'name' => 'Mới đặt hàng'
        ]);
        DB::table('bill_status')->insert([
            'name' => 'Đang xử lý'
        ]);
        DB::table('bill_status')->insert([
            'name' => 'Đang giao hàng'
        ]);
        DB::table('bill_status')->insert([
            'name' => 'Chờ thanh toán'
        ]);
        DB::table('bill_status')->insert([
            'name' => 'Đã thanh toán'
        ]);
    }
}
