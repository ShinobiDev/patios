<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yard extends Model
{
  protected $fillable = [
      'nombre', 'direccion', 'telefono',
  ];

  public function sections (){
    return $this->hasMany(Section::class);
  }

}
