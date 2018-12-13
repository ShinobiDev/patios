<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores_gruas extends Model
{
  protected $fillable = [
      'proveedor', 'placa','descripcion',
  ];

}
