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

          $this->call(BloodsTableSeeder::class);
          $this->call(BreedsTableSeeder::class);
         // $this->call(UsersTableSeeder::class);
         // $this->call(PermissionsTableSeeder::class);
         // $this->call(RolesTableSeeder::class);
         // $this->call(PermissionRoleTableSeeder::class);
         // $this->call(RolesUsersTableSeeder::class);
         //  $this->call(LotsTableSeeder::class);


    }
}
