<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pers = [
            ['name' => 'Admin'],
            ['name' => 'DepartmentMaster'],
            ['name' => 'DivisionMaster'],
            ['name' => 'Employee'],
            ['name' => 'Customer'],

        ];
        foreach ($pers as $per) {
            DB::table('roles')->insert(['name' => $per['name'],'guard_name'=>'web']);
        }
        $user = \App\User::find(1);
        $user->assignRole('Admin');
    }
}
