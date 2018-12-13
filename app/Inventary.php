<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventary extends Model
{
    protected $fillable =
    [
      'id','entries_id', 'title','opcion',
    ];

    protected $dates = ['deleted_at'];
    protected $table = 'inventaries';

    public function entries(){
    return $this->belongsTo('App\Inventary','entries_id');
    }
}
