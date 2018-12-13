<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owenr extends Model
{
  protected $fillable = [
      'nombre', 'documento','celular','mail','direccion','entries_id','tipo_propi',
  ];
}
