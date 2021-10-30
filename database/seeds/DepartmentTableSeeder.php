<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'name' => 'Default',

        ]);
        $DepatmentName='Default';
        $div='Default';
        $pers = [
            ['name' => 'Department_'.$DepatmentName.'_Add'],
            ['name' => 'Department_'.$DepatmentName.'_Update'],
            ['name' => 'Department_'.$DepatmentName.'_Delete'],
            ['name' => 'Department_'.$DepatmentName.'_ForceDelete'],
            ['name' => 'Department_'.$DepatmentName.'_View'],
        ];
        foreach ($pers as $per) {
            DB::table('permissions')->insert(['name' => $per['name'],'guard_name'=>'web']);
        }
        $faker = \Faker\Factory::create();
        for ($i = 0; $i<=3; $i++) {
            $client = [
                'name' => $faker->firstName,
                'created_at' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'),
                'updated_at' => \Carbon\Carbon::now()
            ];
            $pers = [
                ['name' => 'Department_' . $client['name'] . '_Add'],


                ['name' => 'Department_' . $client['name'] . '_Update'],
                ['name' => 'Department_' . $client['name'] . '_Delete'],

                ['name' => 'Department_' . $client['name'] . '_ForceDelete'],
                ['name' => 'Department_' . $client['name'] . '_View'],
            ];
            foreach ($pers as $per) {
                DB::table('permissions')->insert(['name' => $per['name'],'guard_name'=>'web']);
            }

            DB::table('departments')->insert($client);
        }
    }
}
