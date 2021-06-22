<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now = date("Y-m-d H:i:s");
      DB::table("permissions")->insert([
        [
          "id"         => 10,
          "name"       => "create",
          "label"      => "Create",
          "created_at" => $now,
          "updated_at" => $now,
          ],
        [
          "id"         => 11,
          "name"       => "view",
          "label"      => "View",
          "created_at" => $now,
          "updated_at" => $now,
          ],
        [
          "id"         => 12,
          "name"       => "edit",
          "label"      => "Edit",
          "created_at" => $now,
          "updated_at" => $now,
          ],
        [
          "id"         => 13,
          "name"       => "delete",
          "label"      => "Delete",
          "created_at" => $now,
          "updated_at" => $now,
          ],
        ]);
    }
}
