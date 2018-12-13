<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignar extends Model
{
  protected $fillable = [
      'nombre', 'seccion','rango','entries_id',
  ];


  // public function yards(){
  //   return $this->belongsTo('App\Yard','yard_id');
  // }
  //
  //
  // public function sections (){
  //   return $this->belongsTo('App\Section','seccion_id');
  // }
  //
  //
  // public function rangos (){
  //   return $this->belongsTo('App\Rango','Rango_id');
  // }
  //
  public function entries (){
    return $this->belongsTo('App\Entry','entries_id');
  }



}
