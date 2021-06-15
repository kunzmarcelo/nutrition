<?php

use Illuminate\Database\Seeder;

class RolesUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now = date("Y-m-d H:i:s");

      DB::table("role_user")->insert([
              "id"         => 1001,
              "role_id"       => 99,
              "user_id"       => 1,            
          ]);
    }
}
