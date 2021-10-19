<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = ['total', 'id_user'];

    public function user()
    {
        return $this->belongsTo('App\Models\User','id_user');
    }

    
}
