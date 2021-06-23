<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Animal;

class Challenge extends Model
{

    protected $fillable = [
      'start_date',
      'animal_id',
      'total_production',
      'coefficient',
      'result',
      'production_projection',
      'analysis_time',
      'user_id',
      ];
      public function animal(){
        return $this->belongsTo(Animal::class);
      }
}
