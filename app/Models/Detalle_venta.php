<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_venta extends Model
{
    public $timestamps = false; // desactivando el timestamp
    protected $fillable = ['venta_id', 'producto_id','cantidad','precio'];

    public function user()
    {
        return $this->belongsTo('App\Models\User','id_user');
    }
    
}
