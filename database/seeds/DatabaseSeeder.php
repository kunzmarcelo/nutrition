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
         $this->call(LotsTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
         //$this->call(RolesTableSeeder::class);
         //$this->call(RolesUsersTableSeeder::class);
    }
}
