<?php

use Illuminate\Database\Seeder;

class LotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now = date("Y-m-d H:i:s");

      DB::table("lots")->insert([

        ["id"         => 1,"name"       => "Vacas em Lactação","phase"       => "Vacas em Lactação","comments"       => "NULL","color"       => "NULL","created_at" => $now,"updated_at" => $now,],
        ["id"         => 2,"name"       => "Bezerros(as) até 6 meses","phase"       => "Bezerros(as) até 6 meses","comments"       => "NULL","color"       => "NULL","created_at" => $now,"updated_at" => $now,],
        ["id"         => 3,"name"       => "Bezerros(as) de 7 até meses","phase"       => "Bezerros(as) de 7 até meses","comments"       => "NULL","color"       => "NULL","created_at" => $now,"updated_at" => $now,],
        ["id"         => 4,"name"       => "Novilhos(as) acima de 12 meses","phase"       => "Novilhos(as) acima de 12 meses","comments"       => "NULL","color"       => "NULL","created_at" => $now,"updated_at" => $now,],
        ["id"         => 5,"name"       => "Novilhas prenhas","phase"       => "Novilhas prenhas","comments"       => "NULL","color"       => "NULL","created_at" => $now,"updated_at" => $now,],
        ["id"         => 6,"name"       => "Vacas Seca","phase"       => "Vacas Seca","comments"       => "NULL","color"       => "NULL","created_at" => $now,"updated_at" => $now,],
        ["id"         => 7,"name"       => "Enfermaria","phase"       => "Enfermaria","comments"       => "NULL","color"       => "NULL","created_at" => $now,"updated_at" => $now,],
        ["id"         => 8,"name"       => "Touros","phase"       => "Touros","comments"       => "NULL","color"       => "NULL","created_at" => $now,"updated_at" => $now,],
        ["id"         => 9,"name"       => "Engorda","phase"       => "Engorda","comments"       => "NULL","color"       => "NULL","created_at" => $now,"updated_at" => $now,],
        ["id"         => 10,"name"       => "Pré-Parto","phase"       => "Pré-Parto","comments"       => "NULL","color"       => "NULL","created_at" => $now,"updated_at" => $now,],
      ]):
    }
}
