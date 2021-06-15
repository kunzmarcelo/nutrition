<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now = date("Y-m-d H:i:s");

      DB::table("users")->insert([
              "id"         => 1,
              "name"       => "Marcelo Kunz",
              "email"       => "marcelo.kunz92@gmail.com",
              "password"     => Hash::make('123456789'),
              "created_at" => $now,
              "updated_at" => $now,
            ]);
          }
        }
