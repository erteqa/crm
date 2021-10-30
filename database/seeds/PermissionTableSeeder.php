<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pers = [
            ['name' => 'ImportExport'],

        ];
        foreach ($pers as $per) {
            DB::table('permissions')->insert(['name' => $per['name'],'guard_name'=>'web']);
        }
        $pers = [
            ['name' => 'vergi_view'],

        ];
        foreach ($pers as $per) {
            DB::table('permissions')->insert(['name' => $per['name'],'guard_name'=>'web']);
        }
        $pers = [
            ['name' => 'Invoice_Add'],
            ['name' => 'Invoice_Update'],
            ['name' => 'Invoice_Delete'],
            ['name' => 'Invoice_ForceDelete'],
            ['name' => 'Invoice_View'],
        ];
        foreach ($pers as $per) {
            DB::table('permissions')->insert(['name' => $per['name'],'guard_name'=>'web']);
        }
        $pers = [
            ['name' => 'Payment_Add'],
            ['name' => 'Payment_Delete'],
            ['name' => 'Payment_ForceDelete'],
            ['name' => 'Payment_View'],
        ];
        foreach ($pers as $per) {
            DB::table('permissions')->insert(['name' => $per['name'],'guard_name'=>'web']);
        }
        $pers = [
            ['name' => 'Expense_Add'],
            ['name' => 'Expense_Delete'],
            ['name' => 'Expense_ForceDelete'],
            ['name' => 'Expense_View'],
        ];
        foreach ($pers as $per) {
            DB::table('permissions')->insert(['name' => $per['name'],'guard_name'=>'web']);
        }
        $pers = [
            ['name' => 'Balance_Add'],

        ];
        foreach ($pers as $per) {
            DB::table('permissions')->insert(['name' => $per['name'],'guard_name'=>'web']);
        }
        $pers = [
            ['name' => 'Customer_Add'],
            ['name' => 'Customer_Mangment'],

        ];
        foreach ($pers as $per) {
            DB::table('permissions')->insert(['name' => $per['name'],'guard_name'=>'web']);
        }

        $pers = [
            ['name' => 'Employee_Add'],
            ['name' => 'Employee_Mangment'],

        ];
        foreach ($pers as $per) {
            DB::table('permissions')->insert(['name' => $per['name'],'guard_name'=>'web']);
        }

        $pers = [
            ['name' => 'Department_Add'],
            ['name' => 'Department_Mangment'],

        ];
        foreach ($pers as $per) {
            DB::table('permissions')->insert(['name' => $per['name'],'guard_name'=>'web']);
        }

        $pers = [
            ['name' => 'Group_Add'],
            ['name' => 'Group_Mangment'],

        ];
        foreach ($pers as $per) {
            DB::table('permissions')->insert(['name' => $per['name'],'guard_name'=>'web']);
        }
        $pers = [
            ['name' => 'Division_Add'],
            ['name' => 'Division_Mangment'],

        ];
        foreach ($pers as $per) {
            DB::table('permissions')->insert(['name' => $per['name'],'guard_name'=>'web']);
        }

    }
}
