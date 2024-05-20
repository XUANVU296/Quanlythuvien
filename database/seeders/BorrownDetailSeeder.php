<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BorrownDetailSeeder extends Seeder
{
    public function run()
    {
        DB::table('BorrownDetail')->insert([
            [
                'borrown_id' => 1,
                'book_id' => 1,
                'note' => 'Bộ truyện tranh nổi tiếng của Nhật Bản',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'BorrownDate' => 2,
                'book_id' => 2,
                'note' => 'Dành cho những người đam mê CNTT',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
