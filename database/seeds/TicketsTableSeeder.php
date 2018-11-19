<?php

use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $number = 10;

        for ($i = 0; $i < $number; $i++) {
            DB::table('tickets')->insert([
                'title' => str_random(30),
                'content' => str_random(10),
            ]);
        }
    }
}
