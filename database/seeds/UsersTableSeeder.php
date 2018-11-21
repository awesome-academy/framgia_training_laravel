<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('users')->insert([
	        'name' => 'Administrator',
	        'email' => 'doanhdev@gmail.com',
	        'password' => bcrypt('admin123')
        ]);
        DB::table('users')->insert([
            'name' => 'User 1',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('user123')
        ]);
        DB::table('users')->insert([
            'name' => 'User 2',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('user123')
        ]);
        DB::table('users')->insert([
            'name' => 'User 3',
            'email' => 'user3@gmail.com',
            'password' => bcrypt('user123')
        ]);
    }
}
