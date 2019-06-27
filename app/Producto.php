<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "producto";
    protected $fillable = ['codigo','nombre','descripcion','precio','cantidad','imagen','estado','categoria_id','medida_id','marca_id'];
    public $timestamps=false;
    protected $primaryKey = 'codigo';
}
