<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lot;
use App\Medicine;
use App\Reproduction;
use App\AnimalMedicine;

class Animal extends Model
{
    protected $fillable=[
      'earring',
      'record',
      'name',
      'lot_id',
      'birth_date',
      'breed',
      'blood_grade',
      'sex',
      'origin',
      'date_of_last_delivery',
      'value',
      'weaning_date',
      'mother_on_the_property',
      'father_on_the_property',
      'image',
      'active',
      'comments',
      'to_discard',
      'user_id',
    ];
    public function lot(){
      return $this->belongsTo(Lot::class);
    }

    public function opcionais(){
        return $this->belongsToMany(Medicine::class,AnimalMedicine::class,'animal_id','medicine_id');

      }
    public function reproductions(){
        return $this->hasOne(Reproduction::class);

      }
}
