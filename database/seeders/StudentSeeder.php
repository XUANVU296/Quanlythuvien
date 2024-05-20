<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StudentSeeder extends Seeder
{
    public function run()
    {
        DB::table('students')->insert([
            [
                'code' => 1,
                'name' => 'Nguyễn Xuân Vũ',
                'group' => '001',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => 2,
                'name' => 'Nguyễn Ngọc Thắng',
                'group' => '002',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}