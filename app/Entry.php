<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
  protected $fillable = [
    'id', 'placa', 'direccion', 'comparendo','tipo','traslado','recibe','servicio',
    'marca','color','rate_id','crane_id','causal','grado','chasis','fisico','motor',
    'grua','infraccion_id'
  ];


  // public function yards (){
  //   return $this->hasOne(Yard::class);
  // }

  public function inventaries(){
    return $this->hasMany(Inventary::class);
  }

  // public function yards (){
  //   return $this->belongsTo('App\Yard','yard_id');
  // }



  



}
