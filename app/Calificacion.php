<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table = "calificacion";
    protected $fillable = ['id','user_id','producto_id','puntuacion','comentario'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
