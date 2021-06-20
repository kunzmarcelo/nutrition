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
        [
              "id"         => 90,
              "name"       => "admin",
              "label"      => "Admin",
              "created_at" => $now,
              "updated_at" => $now,
          ],
        [
              "id"         => 91,
              "name"       => "produtor",
              "label"      => "Produtor",
              "created_at" => $now,
              "updated_at" => $now,
          ],
        [
              "id"         => 92,
              "name"       => "gerente",
              "label"      => "Gerente",
              "created_at" => $now,
              "updated_at" => $now,
          ],
        [
              "id"         => 93,
              "name"       => "curioso",
              "label"      => "Curioso",
              "created_at" => $now,
              "updated_at" => $now,
          ],
        ]);
    }
}
