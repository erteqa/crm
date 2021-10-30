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
        $user = ['name' => 'admin','email' => 'admin@admin.com','isactive'=>1,'password' => bcrypt('admin')];

        DB::table('users')->insert($user);

        $faker = \Faker\Factory::create();
      // $department_id = \App\Model\Department::all()->pluck('id')->toArray();
       $division_id= \App\Model\Division::all()->pluck('id')->toArray();


        for ($i = 0; $i < 7; $i++) {
            $div=$faker->randomElement($division_id);
            $employees = [
                'name' => $faker->name,
               'password'=>$faker->password,
                'email' => $faker->email,
                'department_id' => App\Model\Division::find($div)->Department->id,
                'division_id' =>$div,
                'created_at' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'),
                'updated_at' => \Carbon\Carbon::now()
            ];

            DB::table('users')->insert($employees);
        }
    }
}
