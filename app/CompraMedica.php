<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompraMedica extends Model
{
    protected $table = "compra_medica";
    protected $fillable = ['id','compra_id','medica_id','cantidad','pcompra'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
