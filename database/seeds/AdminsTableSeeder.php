<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' =>'ABK Bhuiyan',
                'email' => 'jehadfeni@gmail.com',
                'password' => bcrypt('jeh@d2990'),
                'phone' => '01831661534',
                'status' => 'active',
            ],
            [
                'name' =>'Abdur Rahman',
                'email' => 'arsaddam@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '01775168357',
                'status' => 'active',
            ],
        ];
        DB::table('admins')->insert($users);
    }
}
