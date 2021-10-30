<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(DivisionsTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(TaskTypeTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(MailTableSeeder::class);
    }
}
