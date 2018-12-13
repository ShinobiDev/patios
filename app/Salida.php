<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
  protected $fillable = [
      'entries_id', 'owenrs_id','pdf','observacion','verificar','infraccion_id'
  ];

  
}
