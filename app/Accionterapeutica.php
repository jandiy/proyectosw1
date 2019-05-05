<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accionterapeutica extends Model
{
    protected $table = "accionesterapeuticas";
    protected $fillable = ['id','nombre'];
    public $timestamps=false;
    protected $primaryKey = 'id';
}
