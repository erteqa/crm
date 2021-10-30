<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $userIds = \App\User::all()->pluck('id')->toArray();
        $groupid = \App\Model\Group::all()->pluck('id')->toArray();
        $rowRand = rand(30, 100);

        for ($i = 0; $i < $rowRand; $i++) {
            $employees = [
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'password' =>$faker->password,
                'email' => $faker->email,
                'address' => $faker->address,
                'company' =>$faker->company,
                'taxid' =>$faker->creditCardNumber,
                'company_taxid' =>$faker->creditCardNumber,
                'group_id' => $faker->randomElement($groupid),
                'user_id' => $faker->randomElement($userIds),
                'nationality' =>$faker->country,
                'created_at' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'),
                'updated_at' => \Carbon\Carbon::now()
            ];

            DB::table('customers')->insert($employees);
        }
    }
}
