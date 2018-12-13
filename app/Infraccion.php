<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infraccion extends Model
{
  protected $fillable =
  [
    'id','codigo', 'descripcion',
  ];
}
