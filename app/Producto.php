<?php

namespace App;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //protected $table = "productos";
    protected $fillable = ['name','description','cantidad','precio',
    ];
}
