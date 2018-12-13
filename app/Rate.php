<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
      protected $fillable = [
         'id','servicio','anio','valor','tipo_vehiculo',     
      ];

      protected $hidden = [

      ];




}
