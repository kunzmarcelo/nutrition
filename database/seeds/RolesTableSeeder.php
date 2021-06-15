<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now = date("Y-m-d H:i:s");

      DB::table("roles")->insert([
              "id"         => 99,
              "name"       => "admin",
              "label"      => "Admin",
              "created_at" => $now,
              "updated_at" => $now,
          ]);
    }
}
