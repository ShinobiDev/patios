<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
  protected $fillable = [
      'seccion', 'rango','yard_id',
  ];


  public function yards (){
    return $this->belongsTo('App\Yard','yard_id');
  }

  

}
