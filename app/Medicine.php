<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    //
    public function animals()
    {
        //    $this->belongsToMany('relacao', 'nome da tabela pivot', 'key ref. books em pivot', 'key ref. author em pivot')
        return $this->belongsToMany('App\Animals', 'AnimalMedicine', 'medicine_id', 'animal_id')->withPivot(['status']);
    }
}
