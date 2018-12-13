<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoce extends Model
{
  protected $fillable = [

      'entries_id', 'valor_factura','pdf','estado','valor_stb','valor_ittb','elaborado','dias_cantidad',
  ];
}
