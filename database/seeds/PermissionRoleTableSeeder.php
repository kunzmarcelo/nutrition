<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now = date("Y-m-d H:i:s");

      DB::table("permission_role")->insert([
        [
              "id"            => 1001,
              "permission_id" => 10,
              "role_id"       => 90,
          ],
        [
              "id"            => 1002,
              "permission_id" => 11,
              "role_id"       => 90,
          ],
        [
              "id"            => 1003,
              "permission_id" => 12,
              "role_id"       => 90,
          ],
        [
              "id"            => 1004,
              "permission_id" => 13,
              "role_id"       => 90,
          ],


        [
              "id"            => 1005,
              "permission_id" => 10,
              "role_id"       => 91,
          ],
        [
              "id"            => 1006,
              "permission_id" => 11,
              "role_id"       => 91,
          ],
        ]);
    }
}
