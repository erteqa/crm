<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pers = [
            ['name' => 'Start','percent'=>20],
            ['name' => 'Tow','percent'=>40],
            ['name' => 'three','percent'=>60],
            ['name' => 'four','percent'=>80],
            ['name' => 'End','percent'=>100],
        ];
        foreach ($pers as $per) {
            DB::table('states')->insert(['name' => $per['name'],'percent'=> $per['percent']]);
        }
    }
}
