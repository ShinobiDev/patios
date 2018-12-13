<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
  protected $fillable = [
      'valor_stb','valor_ittb','sistema_stb','sistema_ittb',
  ];
}
