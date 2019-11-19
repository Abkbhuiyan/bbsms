<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
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
        DB::table('users')->insert($users);
    }
}
