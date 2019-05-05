<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posicion extends Model
{
    protected $table = "posiciones";
    protected $fillable = ['id','nroestante','nrofila'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
