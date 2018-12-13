<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rango extends Model
{
  protected $fillable = [
      'rango', 'seccion_id',
  ];
}
