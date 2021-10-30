<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'name' => 'Default',
            'division_id'=> 1,
        ]);
        $defult='Default';
        $pers = [
            ['name' => 'Department_'.$defult.'_Division_' . $defult .'_Group_'.$defult . '_Add'],
            ['name' => 'Department_'.$defult.'_Division_' . $defult .'_Group_'.$defult .'_Update'],
            ['name' => 'Department_'.$defult.'_Division_' . $defult .'_Group_'.$defult .'_Delete'],
            ['name' => 'Department_'.$defult.'_Division_' . $defult .'_Group_'.$defult .'_ForceDelete'],
            ['name' => 'Department_'.$defult.'_Division_' . $defult .'_Group_'.$defult .'_View'],
        ];
        foreach ($pers as $per) {
            DB::table('permissions')->insert(['name' => $per['name'],'guard_name'=>'web']);
        }

        $faker = \Faker\Factory::create();
        $DivisionId = \App\Model\Division::all()->pluck('id')->toArray();

        //$rowRand = rand(30,100);

        for ($i = 0; $i<5; $i++) {
            $employees = [
                'name' => $faker->lastName,
                'division_id' => $faker->randomElement($DivisionId),
                'created_at' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now'),
                'updated_at' => \Carbon\Carbon::now()
            ];
            $DepatmentName=\App\Model\Division::find($employees['division_id'])->Department->name;
            $DivisionName=\App\Model\Division::find($employees['division_id'])->name;
           // dd($DepatmentName."  ".$DivisionName);
            $pers = [
                ['name' => 'Department_'.$DepatmentName.'_Division_' . $DivisionName .'_Group_'.$employees['name'] . '_Add'],
                ['name' => 'Department_'.$DepatmentName.'_Division_' . $DivisionName .'_Group_'.$employees['name'] .'_Update'],
                ['name' => 'Department_'.$DepatmentName.'_Division_' . $DivisionName .'_Group_'.$employees['name'] .'_Delete'],
                ['name' => 'Department_'.$DepatmentName.'_Division_' . $DivisionName .'_Group_'.$employees['name'] .'_ForceDelete'],
                ['name' => 'Department_'.$DepatmentName.'_Division_' . $DivisionName .'_Group_'.$employees['name'] .'_View'],
            ];
            foreach ($pers as $per) {
                DB::table('permissions')->insert(['name' => $per['name'],'guard_name'=>'web']);
            }
            DB::table('groups')->insert($employees);
        }

    }
}
