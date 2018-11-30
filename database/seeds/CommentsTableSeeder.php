<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'content' => str_random(10),
            'post_id' => 2,
            'user_id' => 1,
        ]);
    }
}
