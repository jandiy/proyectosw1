<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacoraremota extends Model
{
    protected $connection = 'mysql2';
    protected $table = "bitacoras";
    protected $fillable = ['id','user','accion','fecha','hora', 'email'];
    public $timestamps=false;
    protected $primaryKey = 'id';

}
