<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = "paises";
    protected $fillable = ['id','nombre'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
