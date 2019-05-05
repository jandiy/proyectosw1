<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    protected $table = "laboratorios";
    protected $fillable = ['id','nombre','descripcion','pais_id'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
