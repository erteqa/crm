<?php

use Illuminate\Database\Seeder;

class MailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mails')->insert([

            'host'=>'mail.eritqaa.org',
            'port'=>25,
            'auth'=>'true',
            'auth_type'=>'tls',
            'username'=>'noreply@eritqaa.org',
            'password'=>'Noreply1234_',
            'sender'=>'noreply@eritqaa.org',
        ]);
    }
}
