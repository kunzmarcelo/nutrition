<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
      'collection_date',
      'liters_delivered',
      'liters_consumption',
      'liters_internal_consumption',
      'discarded_liters',
      'total_liters_produced',
      'milk_price',
      'user_id',
    ];
}
