<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table = "oferta";
    protected $fillable = ['id','fecha_inicio','fecha_fin','producto_id','interes'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
