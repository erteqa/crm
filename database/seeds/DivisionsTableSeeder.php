<?php

use Illuminate\Database\Seeder;

class DivisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisions')->insert([
            'name' => 'Default',
            'department_id'=> 1,
        ]);
        $DepatmentName='Default';
        $div='Default';
        $pers = [
            ['name' => 'Department_'.$DepatmentName.'_Division_' . $div . '_Add'],
            ['name' => 'Department_'.$DepatmentName.'_Division_' . $div . '_Update'],
            ['name' => 'Department_'.$DepatmentName.'_Division_' . $div . '_Delete'],
            ['name' => 'Department_'.$DepatmentName.'_Division_' . $div . '_ForceDelete'],
            ['name' => 'Department_'.$DepatmentName.'_Division_' . $div . '_View'],
        ];
        foreach ($pers as $per) {
            DB::table('permissions')->insert(['name' => $per['name'],'guard_name'=>'web']);
        }
        $faker = \Faker\Factory::create();
        $DepatmentId = \App\Model\Department::all()->pluck('id')->toArray();
//        $DepatmentName= \App\Model\Department::all()->pluck('name')->toArray();

        //$rowRand = rand(30,100);

        for ($i = 0; $i<5; $i++) {
            $employees = [
                'name' => $faker->lastName,
                'department_id' => $faker->randomElement($DepatmentId),
                'created_at' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'),
                'updated_at' => \Carbon\Carbon::now()
            ];
           $DepatmentName= \App\Model\Department::find($employees['department_id'])->name;
            $pers = [
                ['name' => 'Department_'.$DepatmentName.'_Division_' . $employees['name'] . '_Add'],
                ['name' => 'Department_'.$DepatmentName.'_Division_' . $employees['name'] . '_Update'],
                ['name' => 'Department_'.$DepatmentName.'_Division_' . $employees['name'] . '_Delete'],
                ['name' => 'Department_'.$DepatmentName.'_Division_' . $employees['name'] . '_ForceDelete'],
                ['name' => 'Department_'.$DepatmentName.'_Division_' . $employees['name'] . '_View'],
            ];
            foreach ($pers as $per) {
                DB::table('permissions')->insert(['name' => $per['name'],'guard_name'=>'web']);
            }
            DB::table('divisions')->insert($employees);
        }
    }
}
