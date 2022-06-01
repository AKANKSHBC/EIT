<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lecturers')->insert([
        [
            'name' => 'Akanksh BC',
            'grade' => 'Grade B',
            'joined_on' => '2013-11-03',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'Shihas',
            'grade' => 'Grade A',
            'joined_on' => '2016-08-18',
            'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'Vikas Shetty',
            'grade' => 'Grade A',
            'joined_on' => '2014-05-23',
            'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'Jebon Lewis',
            'grade' => 'Grade B',
            'joined_on' => '2018-12-26',
            'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'Ankith Shetty',
            'grade' => 'Grade B',
            'joined_on' => '2008-05-26',
            'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'Ranjith Shetty',
            'grade' => 'Grade A',
            'joined_on' => '1999-01-30',
            'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'Chitraj Karvi',
            'grade' => 'Grade B',
            'joined_on' => '2017-04-30',
            'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'Ganapati',
            'grade' => 'Grade A',
            'joined_on' => '2011-02-17',
            'created_at' =>Carbon::now()->format('Y-m-d H:i:s') ,
            'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
        ],
        [
            'name' => 'Nagraj',
            'grade' => 'Grade B',
            'joined_on' => '2020-09-20',
            'created_at' =>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>Carbon::now()->format('Y-m-d H:i:s')
        ]
    
    ]);
       
    }
}
