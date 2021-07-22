<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insemination extends Model
{
    protected $fillable =
    [
      'type',
      'date',      
      'insinuating',
      'note',
      'pre_delivery',
      'semen_id',
      'user_id',
      ];
}
