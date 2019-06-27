<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    protected $table = "medida";
    protected $fillable = ['id','nombre','abreviatura'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
