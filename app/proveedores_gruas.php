<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor_gruas extends Model
{
  protected $fillable = [
      'proveedor', 'placa','descricion',
  ];

}
