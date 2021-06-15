<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Animal;
use App\Medicine;

class AnimalMedicine extends Model
{
  protected $table = 'animal_medicine';
    protected $fillable=[
      'animal_id',
      'medicine_id',
      'application_date',
      'next_application'
    ];


      public function medicines(){
        return $this->belongsTo(Medicine::class,'medicine_id');
      }
      public function animals(){
        return $this->belongsTo(Animal::class,'animal_id');
      }

}
