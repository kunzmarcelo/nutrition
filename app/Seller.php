<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
  protected $fillable = [
      'name',
      'email',
      'level',
      'status',
      'phone',
      'address',
      'about',
  ];
}
