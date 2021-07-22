<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semen extends Model
{
    protected $fillable=[
      'record',
      'name',
      'breed_id',
      'blood_id',
      'supplier_company',
      'sexed',
      'user_id',
    ];
}
