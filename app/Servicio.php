<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
  protected $fillable = [
      'anio', 'crane_id','rate_id','val_grua','val_parqueadero',
  ];

  // public function cranes (){
  //   return $this->hasMany(Crane::class);
  // }
  //
  // public function rates (){
  //   return $this->hasMany(Rate::class);
  // }

  // public function crenes (){
  //   return $this->belongsTo('App\Crane','crane_id');
  // }
  // public function rates (){
  //   return $this->belongsTo('App\Rate','rate_id');
  // }
}
