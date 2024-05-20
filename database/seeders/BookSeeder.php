<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookSeeder extends Seeder {
    public function run()
    {
        DB::table('books')->insert([
            [
                'code' => 100,
                'name' => '7 viên ngọc rồng',
                'author' => 'Nhà xuất bản truyện Nhật Bản',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => 101,
                'name' => 'Học lập trình web',
                'author' => 'Nhà xuất bản giáo dục CNTT',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}