<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    
    protected $table = "bitacoras";
    protected $fillable = ['id','user','accion','fecha','hora', 'email'];
    public $timestamps=false;
    protected $primaryKey = 'id';

}
