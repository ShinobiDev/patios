<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
  protected $fillable = [
      'nombre', 'seccion','rango','entries_id','elaborado',
  ];
}
