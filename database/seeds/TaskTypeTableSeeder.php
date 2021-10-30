<?php

use Illuminate\Database\Seeder;

class TaskTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 6; $i++) {
            $employees = [
                'name' => $faker->jobTitle,
                'created_at' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'),
                'updated_at' => \Carbon\Carbon::now()
            ];

            DB::table('task_types')->insert($employees);
        }
    }
}
