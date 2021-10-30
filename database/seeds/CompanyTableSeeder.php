<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => 'شركة ارتقاء القانونية التجارية',
            'address' => 'الاسكولي طابق 11',
            'city' => 'اسنيورت',
            'region' => 'اسطنبول',
            'country' => 'تركيا',
            'phone' => '0575548',
            'email' => 'info@eritqaa.com',
            'taxid' => '16515',
            'zone' => 'Europe/Istanbul',
            'logo' => 'logo.png',
            'lang' => 'arabic',

        ]);
    }
}
