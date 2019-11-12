<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BloodGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blood_groups = [
            [
                'group_name' => 'O',
                'rh_factor' => '+ ve'
            ],
            [
                'group_name' => 'O',
                'rh_factor' => '- ve'
            ],
            [
                'group_name' => 'A',
                'rh_factor' => '+ ve'
            ],
            [
                'group_name' => 'A',
                'rh_factor' => '- ve'
            ],
            [
                'group_name' => 'B',
                'rh_factor' => '+ ve'
            ],
            [
                'group_name' => 'B',
                'rh_factor' => '- ve'
            ],
            [
                'group_name' => 'AB',
                'rh_factor' => '+ ve'
            ],
            [
                'group_name' => 'AB',
                'rh_factor' => '- ve'
            ],
        ];
        DB::table('blood_groups')->insert($blood_groups);
    }
}
